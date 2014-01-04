<?php

class AdminUserController extends BaseController
{
	public function getIndex()
	{
		$clients = User::where('usertype','=','client')->get();

		return View::make('admin.user.user')
				->with('ptitle','Clients')
				->with('clients',$clients);
	}

	public function getSuperusers()
	{
		$admins = User::where('usertype','!=','client')->get();

		return View::make('admin.user.adminlist')
				->with('ptitle','Adminstrators')
				->with('admins',$admins);
	}

	public function getAddsuper()
	{
		return View::make('admin.user.addsuper')
				->with('ptitle','Add Administrator Account');
	}

	public function postAddsuper()
	{
		$adminval = User::admin_validation( Input::except('btn') );

		if($adminval->fails())
		{
			Input::flash();
			return Redirect::to('admin/users/addsuper')
					->withErrors($adminval);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';
			$res = 'nFailure';

			$u = new User;

			$u->username = Input::get('username');
			$u->email = Input::get('email');
			$u->password = Hash::make(Input::get('password'));
			$u->fill(array(
					'first_name'=>Input::get('first_name'),
					'last_name'=>Input::get('last_name'),
					'usertype'=>'admin',
					'active'=>Input::get('actaccount') ? true:false
				));

			if($u->save())
			{
				$h = new History();
				$h->fill(array(
						'title'=>'New Admin User',
						'description'=>'Username: '.Input::get('username').' '.Input::get('last_name').'<br/>Email: '.Input::get('email')
					));
				$h->save();

				$msg = 'New Administrator account successfully created!';
				$res = 'nSuccess';
			}

			Session::flash('regadmin',$res);
			Session::flash('addmsg',$msg);
			return Redirect::to('admin/users/addsuper');
		}
	}

	public function getEditsuper($id)
	{
		$u = User::findOrFail($id);

		return View::make('admin.user.editsuper')
				->with('ptitle','Edit Adminstrator Account')
				->with('user',$u);
	}

	public function postEdsuper($id) {
		$v = Validator::make(Input::all(), array(
				'username'=>'required',
				'first_name'=>'required',
				'last_name'=>'required',
			), array(
				'username.required'=>'Username is required',
				'first_name.required'=>'First name is required',
				'last_name.required'=>'Last name is required'
			));

		if($v->fails()) {
			Input::flash();
			return Redirect::to('admin/users/editsuper/'.$id)
					->withErrors($adminval);
		} else {

			$msg = 'ERROR: Something went wrong. Please try again later.';
			$res = 'nFailure';

			$u = User::find($id);
			$u->username = Input::get('username');
			$u->first_name = Input::get('first_name');
			$u->last_name = Input::get('last_name');

			if(Input::get('oldpassword') != '' && Hash::check(Input::get('oldpassword'), $u->password)) {
				$vv = Validator::make(Input::all(), array(
						'password'=>'required|confirmed'
					), array(
						'password.required'=>'Please fill up New Password and Confirm Password',
						'password.confirmed'=>'Password mismatch'
					));
				if($vv->fails()) {
					Input::flash();
					return Redirect::to('admin/users/editsuper/'.$id)
						->withErrors($adminval);
				} else {
					$u->password = Hash::make(Input::get('password'));
				}
			}

			if($u->save())
			{
				$h = new History();
				$h->fill(array(
						'title'=>'Admin Updated',
						'description'=>'Username: '.Input::get('username').' '.Input::get('last_name').'<br/>Email: '.Input::get('email')
					));
				$h->save();

				$msg = 'New Administrator account successfully updated!';
				$res = 'nSuccess';
			}

			Session::flash('regadmin',$res);
			Session::flash('addmsg',$msg);
			return Redirect::to('admin/users/editsuper/'.$id);
		}
	}

	public function getNewsletter()
	{
		return View::make('admin.user.newsletter')
				->with('ptitle','Newsletter')
				->with('subscribers',Mymodel::select_table('newsletter'));
	}

	public function getDelsub()
	{
		$n = Newsletter::find(Input::get('sid'));
		$n->delete();
		return Redirect::to('admin/users/newsletter?delsuc');
	}

	public function postSend()
	{
		$news = Input::get('content');

		if($news != "")
		{
			$subs = Newsletter::all();

			$data['content'] = $news;

			foreach ($subs as $val)
			{
				$em = $val->email;
					
				Mail::send('emails.newsletter',$data,function($msg) use ($em){

					$msg->to($em,'Subscriber')
						->subject('Newsletter | Group Gifts');

				});
			}
		}

		return Redirect::to('admin/users/newsletter?sendsuc');
	}

	public function getDelsuper() {
		$n = User::find(Input::get('uid'));
		if($n->email != 'sa@user.admin')
			$n->delete();
		$t = "superusers";
		if($n->usertype != 'admin')
			$t = "";
		return Redirect::to('admin/users/'.$t);
	}
}