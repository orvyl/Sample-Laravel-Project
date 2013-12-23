<?php

class GiftcertController extends BaseController {

	public function getIndex()
	{
		$c = Page::find(6);

		return View::make('shop.gift-cert')
				->with('ptitle','Gift Certificates')
				->with('gfs',Giftc::orderBy('price')->get())
				->with('content',$c->content);
	}

}