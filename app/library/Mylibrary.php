<?php

/*
|	TITLE: Mylibrary
|	DESCRIPTION: General libray for Mindblow Ideas (laravel)
|	AUTHOR: Orvyl "Pogi" Tumaneng ( orvyl@mindblowideas.com / orvyl.t@gmail.com )
*/

class Mylibrary
{
	public static function defValObj($obj,$field)
	{
		return is_null($obj) ? '':$obj->{$field};
	}

	public static function addAsset(&$arr,$ext = 'js')
	{
		$html = '';
		$type = $ext == 'css' ? 'style':'script';

		if(isset($arr))
		{
			if(is_array($arr))
			{
				foreach ($arr as $key => $value)
				{
					// $html .= HTML::{$type}($ext.'/'.$value.'.'.$ext);
					if($type == 'style')
						$html .= HTML::style($ext.'/'.$value.'.'.$ext);
					else
						$html .= HTML::script($ext.'/'.$value.'.'.$ext);
				}
			}
			else
			{
				// $html = HTML::{$type}($ext.'/'.$arr.'.'.$ext);
				if($type == 'style')
					$html = HTML::style($ext.'/'.$arr.'.'.$ext);
				else
					$html = HTML::script($ext.'/'.$arr.'.'.$ext);
			}
		}

		return $html;
	}

	public static function random_char($num_char)
	{
		$length = $num_char;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = '';
		for ($i = 0; $i < $length; $i++)
		{
			$code .= $characters[rand(0, strlen($characters) - 1)];
		}

		return $code;
	}

	public static function displayRate($num)
	{
		$html = '';
		for ($i=1; $i <= 5; $i++)
		{ 
			if($i <= $num)
				$html .= '<span class="rate"></span>&nbsp;';
			else
				$html .= '<span></span>&nbsp;';
		}

		return $html;
	}

	public static function getLessStoreCredit($total, $store_credit)
	{
		$num = $total - $store_credit;
		
		if($store_credit > $total)
			$num = 0;

		return number_format((float)$num, 2, '.', '');
	}

	public static function fb_share($link = '',$pic = '',$name = '',$caption = '',$description = '',$goto_link = '')
	{
		$app = Config::get('facebook');

		$link = $link;
		$pic = $pic;
		$name= urlencode($name);
		$caption = urlencode($caption);
		$description = urlencode($description);
		$goto_link = $goto_link;
		$app_num = $app['appId'];

		return "https://www.facebook.com/dialog/feed?app_id={$app_num}&link={$link}&picture={$pic}&name={$name}&caption={$caption}&description={$description}&redirect_uri={$goto_link}";
  	}
}