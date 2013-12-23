<?php

class FacebookController extends BaseController {

	public $facebook;

	public function __construct()
	{
		$this->facebook = new Facebook(Config::get('facebook'));
	}

	public function fbregistration()
	{
		$user = $this->facebook->api('/me');
		if($user)
		{
			$isexist = User::where('email','=',$user['email'])->count();

			if($isexist == 0)
			{
				$u = new User();

				$u->username = $user['username'];
				$u->email = $user['email'];
				
				$u->fill(array(
						'first_name'=>$user['first_name'],
						'last_name'=>$user['last_name'],
						'active'=>true,
						'usertype'=>'client'
					));
				$u->facebook = $user['id'];

				if($u->save())
				{
					$h = new History();
					$h->fill(array(
							'title'=>'New User: <b>'.$u->username.'</b>',
							'description'=>'New account was created for '.Input::get('first_name').' '.Input::get('last_name').'[login with FACEBOOK]'
						));
					$h->save();
					Auth::login($u);

					return Redirect::to('my-account');
				}
				else
					return 'Ooops! Something went wrong. Try again later.';
			}
			else
			{
				$u = User::where('email','=',$user['email'])->first();
				Auth::login($u);

				return Redirect::to('my-account');
			}
		}
	}
}