<?php

class MyaccountController extends BaseController {

	public function index()
	{
		$countries = Mymodel::select_table('country');
		$states = Mymodel::select_table('state');
		$personal_info = User::find(Auth::user()->id);

		return View::make('my-account.myaccount')
				->with('ptitle','My Account')
				->with('personinfo',$personal_info)
				->with('countries',$countries)
				->with('states',$states);
	}

	public function update_personinfo()
	{
		$withpwd = false;
		if(Input::get('old_password') != '' || Input::get('password') != '' || Input::get('password_confirmation') != '')
		{
			$withpwd = true;
		}

		$v = User::client_validation( Input::all(),true,$withpwd );

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('my-account')->withErrors($v);
		}
		else
		{
			$u = User::find(Auth::user()->id);

			if(Hash::check(Input::get('old_password'), Auth::user()->password))
				$u->password = Hash::make(Input::get('password'));

			$u->fill(array(
					'first_name'=>Input::get('first_name'),
					'last_name'=>Input::get('last_name'),
					'birthday'=>date('Y-m-d',strtotime(Input::get('birthday'))),
					'country'=>Input::get('country'),
					'state'=>Input::get('state'),
					'phone'=>Input::get('phone')
				));

			if($u->save())
			{
				Session::flash('msg','Account Information successfully updated!');
				return Redirect::to('my-account');
			}

			Session::flash('msg','ERROR: Something went wrong. Please try again later.');
			return Redirect::to('my-account');
		}
	}

	public function paymentinfo()
	{
		$paymentinfo = Mymodel::select_where('payment-information','user_id',Auth::user()->id);

		return View::make('my-account.myaccountpay')
				->with('ptitle','Payment Information')
				->with('paymentinfo',$paymentinfo);
	}

	public function update_paymentinfo()
	{
		$v = Validator::make(Input::all(), 
			array(
				'card_type'=>'required',
				'card_number'=>'required',
				'card_holder_fname'=>'required',
				'card_holder_lname'=>'required',
				'expiry_month'=>'required',
				'expiry_year'=>'required'
			));

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('my-account/payment-information')->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';

			$upd = Mymodel::update('payment-information',array(
					'card_type'=>Input::get('card_type'),
					'card_number'=>Input::get('card_number'),
					'card_holder_fname'=>Input::get('card_holder_fname'),
					'card_holder_lname'=>Input::get('card_holder_lname'),
					'expiry_month'=>Input::get('expiry_month'),
					'expiry_year'=>Input::get('expiry_year')
				),'user_id',Auth::user()->id);

			if($upd)
				$msg = 'Payment information successfully updated!';

			Session::flash('msg',$msg);
			return Redirect::to('my-account/payment-information');
		}
	}

	public function orderhistory()
	{
		return View::make('my-account.myaccountorder')
				->with('ptitle','Order History')
				->with('orders',Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get());
	}

	public function orderdetail($id)
	{
		$order = Order::findOrFail($id);

		if($order->user_id != Auth::user()->id)
			return Redirect::to('/');

		return View::make('my-account.order-detail')
				->with('ptitle','Order Detail')
				->with('orderProds',OrderProd::where('order_id',$id)->orderBy('quantity','desc')->get())
				->with('order',$order);
	}

	public function registry()
	{
		return View::make('my-account.registry')
				->with('ptitle','Registry')
				->with('registries',Registry::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get());
	}

	public function registrydetail($id)
	{
		$registry = Registry::findOrFail($id);

		if($registry->user_id != Auth::user()->id)
			return Redirect::to('/');

		if($registry->occasion_type == 'personal')
			$data['addinfo'] = DB::table('registry-personal')->where('registry_id',$id)->first();
		else
			$data['addinfo'] = DB::table('registry-marriage')->where('registry_id',$id)->first();

		return View::make('my-account.registry-detail',$data)
				->with('wishlists',Wishlist::where('registry_id',$id)->get())
				->with('ptitle','Registry Detail')
				->with('regProds',DB::select("select *,qty from products p inner join `registry-product` rp on p.id = rp.prod_id where reg_id = '{$id}'"))
				->with('registry',$registry)
				->with('sumContribution', Registry::sumContribution($id));
	}

	public function gotosetup()
	{
		$id = Input::get('id');

		$registry = Registry::findOrFail($id);

		if($registry->user_id != Auth::user()->id)
			return Redirect::to('/');

		Session::put('rid',$id);
		return Redirect::to('registry/setup');
	}

	public function bye()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}