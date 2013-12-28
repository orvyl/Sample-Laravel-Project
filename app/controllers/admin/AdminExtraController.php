<?php

class AdminExtraController extends BaseController {
	public function getDelproimage() {
		DB::table('product-images')->where('pi_id',Input::get('id'))->delete();
		return Redirect::to('admin/products/'.Input::get('pid').'/edit');
	}
}