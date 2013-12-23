<?php

class AdminRecipientController extends BaseController {

	public function getIndex()
	{
		return View::make('admin.products.recipient')
				->with('ptitle','Recipient')
				->with('recs',Mymodel::select_table('recipient'));
	}

	public function postProcess()
	{
		$v = Validator::make(Input::all(), array('rec'=>'required|unique:recipient,recipient'), array('rec.required'=>'Name is required','rec.unique'=>'Name is already taken'));

		if($v->fails())
		{
			Session::flash('regadmin','nFailure');
			Session::flash('addmsg','Please check some errors');

			Input::flash();
			return Redirect::to('admin/recipient')->withErrors($v);
		}
		else
		{
			Mymodel::insert('recipient',array('recipient'=>Input::get('rec'),'updated_at'=>date('Y-m-d H:i:s')));

			Session::flash('regadmin','nSuccess');
			Session::flash('addmsg','Recipient successfully added!');

			return Redirect::to('admin/recipient');
		}
	}

	public function getDelete()
	{
		Mymodel::delete('recipient','recipient_id',Input::get('id'));
		return Redirect::to('admin/recipient?deleted');
	}

}