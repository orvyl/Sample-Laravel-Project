<?php

class SignupController extends BaseController {

	public function getIndex()
	{
		$countries = Mymodel::select_table('country');
		$states = Mymodel::select_table('state');

		return View::make('signup-login.signup')
				->with('ptitle','Signup')
				->with('countries',$countries)
				->with('states',$states);
	}

	public function postIndex()
	{
		$v = User::client_validation( Input::all() );

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('signup')->withErrors($v);
		}
		else
		{
			if(Input::get('newsletter'))
			{
				$n = new Newsletter();
				$n->email = Input::get('email');
				$n->save();
			}

			$u = new User();

			$u->email = Input::get('email');
			$u->password = Hash::make(Input::get('password'));

			$u->fill(array(
					'first_name'=>Input::get('first_name'),
					'last_name'=>Input::get('last_name'),
					'active'=>true,
					'usertype'=>'client',
					'birthday'=>date('Y-m-d',strtotime(Input::get('birthday'))),
					'country'=>Input::get('country'),
					'state'=>Input::get('state'),
					'phone'=>Input::get('phone')
				));

			if($u->save())
			{
				$h = new History();
				$h->fill(array(
						'title'=>'New User',
						'description'=>'Name: '.Input::get('first_name').' '.Input::get('last_name').'<br/>Email: '.Input::get('email')
					));
				$h->save();

				Mymodel::insert('payment-information',array('user_id'=>$u->id,'card_holder_fname'=>Input::get('first_name'),'card_holder_lname'=>Input::get('last_name')));
				Auth::login($u);
				return Redirect::to('my-account');
			}

			Session::flash('someerror','ERROR: Something went wrong. Please try again later.');
			return Redirect::to('signup');
		}
	}

}