<?php

class CartController extends BaseController {

	public function getIndex()
	{
		$store_credit = DB::table('payment-information')->where('user_id',Auth::user()->id)->pluck('store_credit');

		return View::make('cart.cart')
				->with('ptitle','Cart')
				->with('cart',Cart::content())
				->with('store_credit',$store_credit)
				->with('subtotal',Mylibrary::getLessStoreCredit(Cart::total(), $store_credit));
	}

	public function postGocheckout()
	{
		$rowids = Input::get('rowids');
		$qtys = Input::get('qtys');

		$ctr = 0;
		foreach ($rowids as $value)
		{
			if($qtys[$ctr] != '')
				Cart::update($value, $qtys[$ctr]);

			$ctr++;
		}

		return Redirect::to('cart/payment');
	}

	public function getAddprod($id)
	{
		$p = Product::findOrFail($id);

		if(!Cart::search(array('id'=>$p->id)))
		{
			Cart::add($p->id, $p->product_name, 1, $p->price);
			$msg = '<h4 style="text-align: center;margin: -30px 0 40px 0;">'.$p->product_name.' is added to your cart!</h4>';
		}
		else
			$msg = '<h4 style="text-align: center;margin: -30px 0 40px 0;">'.$p->product_name.' is already in your cart!</h4>';

		Session::flash('msg',$msg);
		return Redirect::to('shop/'.$id);
	}

	public function getAddgc($id)
	{
		$gc = Giftc::findOrFail($id);

		if(!Cart::search(array('id'=>'gc_'.$gc->id)))
		{
			Cart::add('gc_'.$gc->id, 'Gift Cert: '.$gc->gc_name, 1, $gc->price);
			$msg = '<h4 style="text-align: center;margin: -30px 0 40px 0;">$'.$gc->price.' gift certificate is added to your cart!</h4>';
		}
		else
			$msg = '<h4 style="text-align: center;margin: -30px 0 40px 0;">This gift certificate is already in your cart!</h4>';

		Session::flash('msg',$msg);
		return Redirect::to('gift-certificates');
	}

	public function getEmpt()
	{
		Cart::destroy();
		return Redirect::to('/');
	}

	public function getPayment()
	{
		if(Cart::count() == 0)
			return Redirect::to('cart');

		$paymentinfo = Mymodel::select_where('payment-information','user_id',Auth::user()->id);
		$store_credit = DB::table('payment-information')->where('user_id',Auth::user()->id)->pluck('store_credit');

		return View::make('cart.payment')
				->with('ptitle','Payment')
				->with('cart',Cart::content())
				->with('paymentinfo',$paymentinfo)
				->with('store_credit',$store_credit)
				->with('subtotal',Mylibrary::getLessStoreCredit(Cart::total(), $store_credit));
	}

	public function getRemoveitem()
	{
		Cart::remove(Input::get('id'));
		return Redirect::to('cart');
	}

	public function postPay()
	{

		if(!Input::get('agree'))
		{
			Input::flash();
			Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">You must agree on our Terms and Conditions</p>');
			return Redirect::to('cart/payment');
		}

		$store_credit = DB::table('payment-information')->where('user_id',Auth::user()->id)->pluck('store_credit');

		switch (Input::get('type_card')) {
			case 'paypal':

				$pay = Paypal::acceptPaypal(array(
						'total'=>Mylibrary::getLessStoreCredit(Cart::total(), $store_credit),
						'return_url'=>URL::to('cart/returnpaypalpayment'),
						'cancel_url'=>URL::to('cart/cancelpaypalpayment'),
						'description'=>'This is for the payment for the cool items to be brought from Group Gifts!'
					));

				if($pay['result'])
				{
					Session::put('paypalPaymentID',$pay['id']);
					return Redirect::to($pay['approve_link']);
				}

				Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Oooops! Something went wrong. Please check your inputs and try again</p>');
				return Redirect::to('cart/payment');

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
					return Redirect::to('cart/payment');
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
							'total'=>Mylibrary::getLessStoreCredit(Cart::total(), $store_credit),
							'description'=>'This is for the payment for the cool items to be brought from Group Gifts!'
						));


					if($pay['result'])
					{
						if($this->commitOrdersCredit($pay['data']))
						{
							Cart::destroy();
							return Redirect::to('cart/thankyou');
						}
					}

					Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Oooops! Something went wrong. Please check your inputs and try again</p>');
					return Redirect::to('cart/payment');
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
				if($this->commitOrdersPaypal($pay['data']))
				{
					Cart::destroy();
					return Redirect::to('cart/thankyou');
				}
			}
		}

		Session::flash('error','<p style="text-align: center;margin: 3px; color: gray;">Oooops! Something went wrong. Please check your inputs and try again</p>');
		return Redirect::to('cart/payment');
	}

	public function getCancelpaypalpayment()
	{
		// return 'Cancel Payment';
		return Redirect::to('cart');
	}

	public function getThankyou()
	{
		return View::make('cart.thank-you')
				->with('ptitle','Thank you');
	}

	public function commitOrdersCredit($data)
	{
		$funding_instruments = $data->payer->funding_instruments;
		$amount = $data->transactions[0]->amount;

		$order = new Order();
		$order->user_id = Auth::user()->id;
		$order->payment_type = 'credit_card';
		$order->paypaltrans_id = $data->id;
		$order->first_name = $funding_instruments[0]->credit_card->first_name;
		$order->last_name = $funding_instruments[0]->credit_card->last_name;
		$order->total = $amount->total;
		$order->store_credit = 20.00;
		$order->voucher = '';

		if($order->save())
		{
			$this->addCartOrder($order->id);
			return true;
		}

		return false;
	}

	public function commitOrdersPaypal($data)
	{
		$payer_info = $data->payer->payer_info;
		$amount = $data->transactions[0]->amount;

		$order = new Order();
		$order->user_id = Auth::user()->id;
		$order->payment_type = 'paypal';
		$order->paypaltrans_id = $data->id;
		$order->payer_id = $payer_info->payer_id;
		$order->first_name = $payer_info->first_name;
		$order->last_name = $payer_info->last_name;
		$order->total = $amount->total;
		$order->store_credit = 20.00;
		$order->voucher = '';

		if($order->save())
		{
			$this->addCartOrder($order->id);
			return true;
		}

		return false;
	}

	public function addCartOrder($order_id)
	{
		$products = Cart::content();

		foreach ($products as $prod)
		{
			$did = explode('_', $prod->id);
			if(count($did) == 2)
				$this->addGC($did[1],$prod->qty);

			$op = new OrderProd();
			$op->order_id = $order_id;
			$op->product_id_ref = $prod->id;
			$op->product_name = $prod->name;
			$op->price = $prod->price;
			$op->quantity = $prod->qty;
			$op->total_price = $prod->price * $prod->qty;

			$op->save();
		}
	}

	public function addGC($id,$qty) {
		for ($i=0; $i < $qty; $i++) { 
			$gcc = new Gccode();
			$gcc->user_id = Auth::user()->id;
			$gcc->gc_id = $id;
			$gcc->code = date('Ymd').'-'.Mylibrary::random_char(8).'-'.Auth::user()->id.$i;
			$gcc->available = true;
			
			$gcc->save();
		}
	}
}