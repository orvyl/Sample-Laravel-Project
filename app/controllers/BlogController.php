<?php

class BlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('blog.blog')
				->with('ptitle','Blog')
				->with('blogs',Blog::disp_arch(Input::get('year'), Input::get('month')));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('blog.single')
				->with('ptitle','The title of blog')
				->with('blog',Blog::find($id));
	}

}