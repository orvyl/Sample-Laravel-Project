<?php

class ContributorsController extends BaseController {

	public function getIndex() {
		$testreg = Registry::where('user_id',Auth::user()->id)->where('id',Input::get('reg'))->count();

		if($testreg != 1)
			return Redirect::to('/');

		return View::make('registry.contributors')
				->with('ptitle','Contributors')
				->with('contributors',InvContri::where('registry_id',Input::get('reg'))->get());
	}

	public function postAddcontri() {
		$v = Validator::make(Input::all(), array(
				'cname'=>'required',
				'cemail'=>'required|email|unique:invited-contributors,email'
			), array(
				'cname.required'=>'Please give the complete name',
				'cemail.required'=>'Please give the complete name',
				'cemail.email'=>'Invalid email format',
				'cemail.unique'=>'Email already added'
			));

		if($v->fails()) {
			Input::flash();
			return Redirect::to('registry/contributors?reg='.Input::get('regid'))->withErrors($v);
		} else {
			$ic = new InvContri();
			$ic->name = Input::get('cname');
			$ic->email = Input::get('cemail');
			$ic->registry_id = Input::get('regid');

			if($ic->save())
				return Redirect::to('registry/contributors?suc&reg='.Input::get('regid'));
			return Redirect::to('registry/contributors?err&reg='.Input::get('regid'));
		}
	}

}