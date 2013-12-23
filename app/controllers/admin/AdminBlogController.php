<?php

class AdminBlogController extends \BaseController {
	
	public function getIndex()
	{
		return View::make('admin.blog.blog')
				->with('ptitle','Blog')
				->with('blogs',Blog::all());
	}

	public function getCreate()
	{
		return View::make('admin.blog.create-blog')
				->with('ptitle','Create new Blog');
	}

	public function postCreateblog()
	{
		$v = Blog::validate(Input::all());

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('admin/blog/create')->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later';
			$errtype = 'nFailure';

			$b = new Blog();
			$b->title = Input::get('btitle');
			$b->content = Input::get('bcontent');
			if(Input::hasFile('img'))
				$b->image = $this->uploadImage(Input::file('img'));

			if($b->save())
			{
				$msg = 'Blog successfully created!';
				$errtype = 'nSuccess';
			}

			Session::flash('msg',$msg);
			Session::flash('regadmin',$errtype);
			return Redirect::to('admin/blog/create');
		}
	}

	public function uploadImage($file)
	{
		$destPath = 'uploads/blogs';
		$ext = $file->getClientOriginalExtension();
		$filename = 'blog_'.date('mdyHis').Mylibrary::random_char(3).'.'.$ext;
		if($file->move($destPath,$filename))
		{
			$imgcrop = new Image_moo();

			$imgcrop->load($destPath.'/'.$filename)
					->resize_crop(137,85)
					->save_pa('thumb_','',TRUE);

			$imgcrop->load($destPath.'/'.$filename)
					->resize_crop(421,258)
					->save_pa('pres_','',TRUE);

			$imgcrop->load($destPath.'/'.$filename)
					->resize_crop(93,60)
					->save_pa('small_','',TRUE);

			return $filename;
		}

		return '';
	}

	public function postDelmul()
	{
		foreach (Input::get('blog_id') as $value)
		{
			$b = Blog::find($value);
			$b->delete();
		}

		Session::flash('disp',true);
		return Redirect::to('admin/blog');
	}

	public function getEdit()
	{
		$id = Input::get('id');

		return View::make('admin.blog.edit-blog')
				->with('ptitle','Edit Blog')
				->with('blog',Blog::find($id));
	}

	public function postEditblog()
	{
		$id = Input::get('blog_id');

		$v = Blog::validate(Input::all());

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('admin/blog/edit?id='.$id)->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later';
			$errtype = 'nFailure';

			$b = Blog::find($id);
			$b->title = Input::get('btitle');
			$b->content = Input::get('bcontent');
			if(Input::hasFile('img'))
				$b->image = $this->uploadImage(Input::file('img'));

			if($b->save())
			{
				$msg = 'Blog successfully updated!';
				$errtype = 'nSuccess';
			}

			Session::flash('msg',$msg);
			Session::flash('regadmin',$errtype);
			return Redirect::to('admin/blog/edit?id='.$id);
		}
	}
}