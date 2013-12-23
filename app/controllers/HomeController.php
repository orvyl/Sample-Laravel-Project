<?php

class HomeController extends BaseController {

	public function index()
	{
		$assets = array(
				'css'=>'flexslider.css',
				'js'=>array('jquery.flexslider.js','functions/home.js')
			);

		return View::make('home.home',$assets)
				->with('ptitle','Home')
				->with('occtypes',OccType::all())
				->with('randproducts',Product::orderBy(DB::raw('rand()'))->take(10)->get());
	}

	public function addEmailNewsletter()
	{
		$v = Validator::make(Input::except('btn'), array('em'=>'email|unique:newsletter,email|required'), array('required'=>'Please give your Email','email'=>'Oops! Email is not valid','unique'=>'Sorry but email already registered'));

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('/#nletter')->withErrors($v);
		}
		else
		{
			Mymodel::insert('newsletter',array('email'=>Input::get('em'),'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')));
			Session::flash('success_newsletter','Email successfully added!');
			return Redirect::to('/#nletter');
		}
	}
}