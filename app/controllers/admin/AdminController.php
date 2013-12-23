<?php

class AdminController extends BaseController
{
	public function login()
	{
		if (Auth::check() && Auth::user()->usertype == 'admin') return Redirect::to('admin');

		return View::make('admin.login')
				->with('js','adminpublic/js/loginvaladmin');
	}

	public function goLogin()
	{
		$logincreds = array(
				'email'=>Input::get('email'),
				'password'=>Input::get('password'),
				'usertype'=>'admin'
			);

		$url = isset($_GET['ret']) ? $_GET['ret']:URL::to('admin');

		if( Auth::attempt( $logincreds ) )
			return json_encode(array('login'=>1,'url'=>$url));

		return json_encode(array('login'=>0));
	}

	public function forgpass()
	{
		$u = User::where('email', Input::get('email'))->first();

		if(count($u) == 1)
		{
			$newpwd = Mylibrary::random_char(6);

			$admn = User::find($u->id);
			$admn->password = Hash::make($newpwd);
			$admn->save();

			$data = array(
					'email'=>Input::get('email'),
					'new_pwd'=>$newpwd,
					'isAdmin'=>true
				);

			$res = Mail::send('emails.forgot-pwd', $data, function($message)
			{
			    $message->to(Input::get('email'))->subject('Forgot Password | Admin account');
			});

			if($res)
				return '<p style="text-align: center; margin: 50px; font-size: 15px;">New password successfully sent!</p>';
			return '<p style="text-align: center; margin: 50px; font-size: 15px;">Ooops! Something went wrong. Please try again later.</p>';
		}

		return '<p style="text-align: center; margin: 50px; font-size: 15px;">Email not registered as Admin!</p>';
	}

	public function adminlogout()
	{
		$user = User::find(Auth::user()->id);
		$user->touch();
		Auth::logout();
		return Redirect::to('admin/login');
	}

	/*DASHBOARD*/
	public function index()
	{
		$u = User::where('usertype','!=','client')->get();
		$hists = History::orderBy('created_at','desc')->get();

		return View::make('admin.dashboard.dashboard')
				->with('ptitle','Dashboard')
				->with('admins',$u)
				->with('history',$hists);
	}

	/*Notes*/

	public function addNote()
	{
		$v = Notes::validate( Input::all() );
		$result = array(
				'cl'=>'nFailure',
				'msg'=>'All fields are required. Please check.'
			);

		if(!$v->fails())
		{
			$result = 1;
			$n = new Notes();
			$n->user_id = Auth::user()->id;
			$n->title = Input::get('title');
			$n->details = Input::get('details');
			$n->type = Input::get('type');

			if($n->save())
			{
				$result = array(
						'cl'=>'nSuccess',
						'msg'=>'Note successfully added!'
					);
			}
			else
				$result['msg'] = 'ERROR: Something went wrong. Please try again later.';
		}

		return json_encode($result);
	}

	public function deleteNote()
	{
		$n =Notes::find(Input::get('id'));
		$n->delete();
	}

	public function changestNote()
	{
		$n = Notes::find(Input::get('id'));

		if($n->done == 0)
		{
			$n->done = 1;
			$n->save();
			return 'uDone';
		}
		else
		{
			$n->done = 0;
			$n->save();
			return $n->type;
		}
	}
}