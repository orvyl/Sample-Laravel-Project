<?php

class LoginController extends BaseController {

	public function getIndex()
	{
		return View::make('signup-login.login')
				->with('ptitle','Login');
	}

	public function postIndex()
	{
		$creds = array(
				'email'=>Input::get('email'),
				'password'=>Input::get('password'),
				'active'=>true
			);

		if(Auth::attempt($creds))
			return Redirect::intended( 'my-account' );
		else
		{
			Input::flash();
			Session::flash('msg','Account does not exist');
			return Redirect::to('login');
		}
	}

	public function getForgotpassword()
	{
		return View::make('signup-login.forg-pass')
				->with('ptitle','Forgot Password');
	}

	public function postGoforgpassword()
	{
		$v = Validator::make(Input::all(), array(
				'email'=>'required|email|exists:users,email'
			), array(
				'email.required'=>'Please give your email',
				'email.email'=>'Invalid email',
				'email.exists'=>'Email is not registered'
			));

		if($v->fails())
		{
			Input::flash();
			return Redirect::to(URL::to('login/forgotpassword'))->withErrors($v);
		}
		else
		{	
			$em = Input::get('email');
			$newpwd = Mylibrary::random_char(6);

			$u = User::where('email',$em)->firstOrFail();

			$usr = User::find($u->id);
			$usr->password = Hash::make($newpwd);
			$usr->save();

			$data = array(
					'email'=>$em,
					'new_pwd'=>$newpwd,
					'isAdmin'=>false
				);

			$m = Mail::send('emails.forgot-pwd',$data,function($msg) use ($em){
				$msg->to($em,'User')
					->subject('Forgot Password | Group Gifts');
			});

			if($m)
				Session::flash('msg','<p style="text-align: center">New password was generated. Please check you email now.</p>');
			else
				Session::flash('msg','<p style="text-align: center">Ooops! Something went wrong. Please try again later.</p>');

			return Redirect::to('login/forgotpassword');
		}
	}

}