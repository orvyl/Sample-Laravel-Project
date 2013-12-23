<?php

class RegcontributeController extends BaseController {

	public function postCheckcode()
	{
		$v = Validator::make(Input::all(), array('code'=>'required|exists:registry,code'), array('code.required'=>'Please give registry code', 'code.exists'=>'Registry Code not found'));

		if($v->fails())
			return Redirect::to('registry')->withErrors($v);
		else
			return Redirect::to('the-registry?c='.Input::get('code'));
	}

	public function getIndex()
	{
		$code = Input::get('c');

		$registry = Registry::where('code',$code)->first();

		if($registry->occasion_type == 'personal')
			$data['addinfo'] = DB::table('registry-personal')->where('registry_id',$registry->id)->first();
		else
			$data['addinfo'] = DB::table('registry-marriage')->where('registry_id',$registry->id)->first();

		return View::make('registry.the-registry',$data)
				->with('ptitle','Gift Registry')
				->with('registry',$registry)
				->with('wishlists',Wishlist::where('registry_id',$registry->id)->get())
				->with('regProds',DB::select("select *,qty from products p inner join `registry-product` rp on p.id = rp.prod_id where reg_id = '{$registry->id}'"));
	}

	public function getContribute($id)
	{
		$registry = Registry::findOrFail($id);
		if(Auth::check() && Auth::user()->usertype == 'client')
			$data['paymentinfo'] = Mymodel::select_where('payment-information','user_id',Auth::user()->id);

		return View::make('registry.payment.payment')
				->with('ptitle','Contribute')
				->with('wishlists',Wishlist::where('registry_id',$id)->get())
				->with('regProds',DB::select("select *,qty from products p inner join `registry-product` rp on p.id = rp.prod_id where reg_id = '{$id}'"))
				->with('registry',$registry)
				->with('sumContribution', Registry::sumContribution($id));
	}

	public function postProcesscontribute()
	{
		$id = Input::get('rid');

		if(Input::get('amountcontribute') == '' || (!is_float(Input::get('amountcontribute')) && !is_numeric(Input::get('amountcontribute'))))
		{
			Input::flash();
			Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Please check your amount to contribute</p>');
			return Redirect::to('the-registry/contribute/'.$id);
		}
		else if(!Input::get('agree'))
		{
			Input::flash();
			Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">You must agree on our Terms and Conditions</p>');
			return Redirect::to('the-registry/contribute/'.$id);
		}

		$amountToContribute = Input::get('amountcontribute');
		$reg = Registry::find($id);
		switch (Input::get('type_card'))
		{
			case 'paypal':

				$pay = Paypal::acceptPaypal(array(
						'total'=>$amountToContribute,
						'return_url'=>URL::to('the-registry/returnpaypalpayment'),
						'cancel_url'=>URL::to('the-registry/cancelpaypalpayment'),
						'description'=>'This is for your contribution to '.$reg->registry_title.' (a '.$reg->occasion_type.' registry).'
					));

				if($pay['result'])
				{
					Session::put('rid',$id);

					Session::put('paypalPaymentID',$pay['id']);
					return Redirect::to($pay['approve_link']);
				}

				Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Oooops! Something went wrong. Please check your inputs and try again</p>');
				return Redirect::to('the-registry/contribute/'.$id);

				break;

			default:

				$rules = array(
						'cardtype'=>'required',
						'cardnumber'=>'required',
						'cardholderfname'=>'required',
						'cardholderlname'=>'required',
						'expmonth'=>'required',
						'expyear'=>'required',
						'securitynumber'=>'required'
					);

				$v = Validator::make(Input::all(), $rules);

				if($v->fails())
				{
					Input::flash();
					Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">All fields under CREDIT CARD is required</p>');
					return Redirect::to('the-registry/contribute/'.$id);
				}
				else
				{
					$pay = Paypal::acceptCreditCard(array(
							'cardtype'=>Input::get('cardtype'),
							'cardnumber'=>Input::get('cardnumber'),
							'cardholderfname'=>Input::get('cardholderfname'),
							'cardholderlname'=>Input::get('cardholderlname'),
							'expmonth'=>date('n', strtotime(Input::get('expmonth').'/1/2000')),
							'expyear'=>Input::get('expyear'),
							'cvv'=>Input::get('securitynumber'),
							'total'=>$amountToContribute,
							'description'=>'This is for your contribution to '.$reg->registry_title.' (a '.$reg->occasion_type.' registry).'
						));


					if($pay['result'])
					{
						if($this->commitContributeCredit($pay['data'],$id))
							return Redirect::to('the-registry/thankyou');
					}

					Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Oooops! Something went wrong. Please check your inputs and try again</p>');
					return Redirect::to('the-registry/contribute/'.$id);
				}

				break;
		}
	}

	public function getReturnpaypalpayment()
	{
		if(Input::get('token') != '' && Input::get('PayerID') != '')
		{
			$pay = Paypal::executePaypalPayment(Input::get('PayerID'), Input::get('token'));

			if($pay['result'])
			{
				if($this->commitOrdersPaypal($pay['data'], Session::get('rid')))
				{
					Cart::destroy();
					return Redirect::to('the-registry/thankyou');
				}
			}
		}

		Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Oooops! Something went wrong. Please check your inputs and try again</p>');
		return Redirect::to('the-registry/contribute/'.Session::get('rid'));
	}

	public function getCancelpaypalpayment()
	{
		return Redirect::to('the-registry/contribute/'.Session::get('rid'));
	}

	public function commitContributeCredit($data, $id)
	{
		$funding_instruments = $data->payer->funding_instruments;
		$amount = $data->transactions[0]->amount;

		$contri = new Contribution();
		$contri->payment_type = 'credit_card';
		$contri->paypaltrans_id = $data->id;
		$contri->first_name = $funding_instruments[0]->credit_card->first_name;
		$contri->last_name = $funding_instruments[0]->credit_card->last_name;
		$contri->contribution = $amount->total;
		$contri->registry_id = $id;

		if($contri->save())
			return true;

		return false;
	}

	public function commitOrdersPaypal($data, $id)
	{
		$payer_info = $data->payer->payer_info;
		$amount = $data->transactions[0]->amount;

		$contri = new Contribution();
		$contri->payment_type = 'paypal';
		$contri->paypaltrans_id = $data->id;
		$contri->payer_id = $payer_info->payer_id;
		$contri->first_name = $payer_info->first_name;
		$contri->last_name = $payer_info->last_name;
		$contri->contribution = $amount->total;
		$contri->registry_id = $id;

		Session::forget('rid');

		if($contri->save())
			return true;

		return false;
	}

	public function getThankyou()
	{
		$content = Page::find(8);

		return View::make('registry.payment.thank-you')
				->with('ptitle','Thank you')
				->with('content',$content->content);
	}

}