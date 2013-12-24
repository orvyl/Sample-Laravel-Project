<?php

class FacebookController extends BaseController {

	public $facebook;

	public function __construct() {
		$this->facebook = new Facebook(Config::get('facebook'));
	}

	public function fbregistration()
	{
		$this->facebook->destroySession();
		$params = array(
		  'scope' => 'email',
		  'redirect_uri' => URL::to('fudge')
		);
		$fb_login_url = $this->facebook->getLoginUrl($params);  

		return Redirect::to($fb_login_url);
	}

	public function fbcheck() {

		$facebook = new Facebook(Config::get('facebook'));
		$user = $facebook->api('/me');

		if($user)
		{
			$em = isset($user['email']) ? $user['email']:$user['username'].'@facebook.com';
			$isexist = User::where('email','=',$em)->count();

			if($isexist == 0)
			{
				$u = new User();

				$u->username = $user['username'];
				$u->email = $em;
				
				$u->fill(array(
						'first_name'=>$user['first_name'],
						'last_name'=>$user['last_name'],
						'active'=>true,
						'usertype'=>'client'
					));

				if($u->save())
				{
					$h = new History();
					$h->fill(array(
							'title'=>'New User: <b>'.$u->username.'</b>',
							'description'=>'New account was created for '.Input::get('first_name').' '.Input::get('last_name').'[login with FACEBOOK]'
						));
					$h->save();

					Mymodel::insert('payment-information',array('user_id'=>$u->id,'card_holder_fname'=>$user['first_name'],'card_holder_lname'=>$user['last_name']));
					Auth::login($u);

					return Redirect::to('my-account');
				}
				else
					return 'Ooops! Something went wrong. Try again later.';
			}
			else
			{
				$u = User::where('email','=',$em)->first();
				Auth::login($u);

				return Redirect::to('my-account');
			}
		}
	}
}