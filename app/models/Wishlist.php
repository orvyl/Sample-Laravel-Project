<?php

class Wishlist extends Eloquent {

	protected $table = "wishlist";

	public static function get_img($i = "",$pre = "thumbnail")
	{
		$img = $pre.'_default.jpg';

		if($i != '')
			$img = $pre.'_'.$i;

		return URL::to('uploads/wishlist/'.$img);
	}
}