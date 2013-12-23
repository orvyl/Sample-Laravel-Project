<?php

class ContactController extends BaseController {

	public function getIndex()
	{
		return View::make('contact-us')
				->with('ptitle','Contact Us');
	}

	public function postIndex()
	{
		$v = Validator::make(Input::all(), array(
				'client_name'=>'required',
				'email'=>'required|email',
				'msg'=>'required'
			));

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('contact-us')->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later';
			$data = array(
					'name'=>Input::get('client_name'),
					'email'=>Input::get('email'),
					'msgs'=>Input::get('msg')
				);

			$sent = Mail::send('emails.contact-us',$data,function($msg){

				$msg->to('orvyl@mindblowideas.com','Adminstrator')
					->subject('Inquiry | Group Gifts');

			});

			if($sent)
				$msg = 'Inquiry successfully sent!';

			Session::flash('msg',$msg);
			return Redirect::to('contact-us');
		}
	}

}