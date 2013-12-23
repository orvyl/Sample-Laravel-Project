<?php

class AdminCMS extends BaseController {

	public function getIndex()
	{
		$p = Page::find( Input::get('page') == '' ? 1:Input::get('page') );

		return View::make('admin.cms.cms')
				->with('ptitle','CMS')
				->with('page',$p)
				->with('pages',Page::all());
	}

	public function postIndex()
	{
		$msg = 'ERROR: Something went wrong. Please try again later.';
		$res = 'nFailure';

		$p = Page::find(Input::get('pid'));
		$p->content = Input::get('content');
		
		if($p->save())
		{
			$msg = 'Page successfully updated!';
			$res = 'nSuccess';
		}

		Session::flash('regadmin',$res);
		Session::flash('addmsg',$msg);
		return Redirect::to('admin/cms?page='.Input::get('pid'));
	}
}