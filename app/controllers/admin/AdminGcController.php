<?php

class AdminGcController extends BaseController {

	public function getIndex()
	{
		return View::make('admin.products.create-gc')
				->with('ptitle','Gift Certificates')
				->with('gfc',Giftc::all());
	}

	public function postProcess()
	{
		$v = Validator::make(Input::all(), array('gc_name'=>'required','price'=>'required'), array('gc_name.required'=>'Gift certificate name is required','price.required'=>'Price is required'));

		if($v->fails())
		{
			Session::flash('regadmin','nFailure');
			Session::flash('addmsg','Please check some errors');

			Input::flash();
			return Redirect::to('admin/products/create')->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';
			$errortype = 'nFailure';

			$gc = new Giftc();
			$gc->gc_name = Input::get('gc_name');
			$gc->price = Input::get('price');

			if($gc->save())
			{
				$msg = 'Gift Certificate successfully created!';
				$errortype = 'nSuccess';
			}

			Session::flash('regadmin',$errortype);
			Session::flash('addmsg',$msg);

			return Redirect::to('admin/gift-certs');
		}
	}

	public function getDelete()
	{
		$g = Giftc::find(Input::get('id'));
		$g->delete();

		return Redirect::to('admin/gift-certs?deleted');
	}

}