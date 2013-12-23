<?php

class WishingwellController extends BaseController {

	public function getIndex()
	{
		if(!Session::has('rid'))
			return Redirect::to('registry/create-registry-personal');

		return View::make('wishingwell.question')
				->with('ptitle','Add Wishing Well');
	}

	public function getAdd()
	{
		if(!Session::has('rid'))
			return Redirect::to('registry/create-registry-personal');
		
		return View::make('wishingwell.addwish')
				->with('ptitle','Create Wishlist')
				->with('js','functions/wishlist.js');
	}

	public function upload_image($file,$wid)
	{
		$destPath = 'uploads/wishlist';
		$ext = $file->getClientOriginalExtension();
		$filename = 'wishlist'.$wid.'.'.$ext;
		if($file->move($destPath,$filename))
		{
			$w = Wishlist::find($wid);
			$w->wish_image = $filename;
			$w->save();

			 $imgcrop = new Image_moo();

			$imgcrop->load($destPath.'/'.$filename)
					->resize_crop(290,185)
					->save_pa('press_','',TRUE);

			$imgcrop->load($destPath.'/'.$filename)
					->resize_crop(93,60)
					->save_pa('smallthumb_','',TRUE);

			$imgcrop->load($destPath.'/'.$filename)
					->resize_crop(158,83)
					->save_pa('thumbnail_','',TRUE);
		}
	}

	public function postAdd()
	{
		$v = Validator::make(Input::all(),
				array(
					'wish_title'=>'required',
					'wish_desc'=>'required',
					'wish_img'=>'image',
					'wish_amount'=>'required'
				),
				array(
					'wish_img.image'=>'Invalid file. Please choose a valid image'
				)
			);

		if($v->fails())
		{
			Session::flash('msg','<p style="text-align: center;color: white;margin: 3px;font-size: 15px;">Ooops! Please check error(s)</p>');
			Input::flash();
			return Redirect::to('registry/wishing-well/add')->withErrors($v);
		}
		else
		{
			$rid = Session::get('rid');

			$w = new Wishlist();
			$w->registry_id = $rid;
			$w->wish_title = Input::get('wish_title');
			$w->wish_desc = Input::get('wish_desc');
			$w->wish_amount = Input::get('wish_amount');

			if($w->save())
			{
				if(Input::hasFile('wish_img'))
					$this->upload_image(Input::file('wish_img'),$w->id);

				// Session::forget('rid');

				return Redirect::to('registry/setup');
			}
			else
			{
				Session::flash('msg','<p style="text-align: center;color: white;margin: 3px;font-size: 15px;">ERROR: Something went wrong. Please try again later.</p>');
				return Redirect::to('registry/wishing-well/add');
			}
		}
	}

	public function getRemovewish()
	{
		$id = Input::get('id');

		$w = Wishlist::find($id);
		$w->delete();

		return Redirect::to('registry/setup');
	}
}