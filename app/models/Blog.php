<?php

class Blog extends Eloquent {

	public static function validate($input)
	{
		$rules = array(
				'btitle'=>'required',
				'bcontent'=>'required',
				'img'=>'image'
			);

		$messages = array(
				'btitle.required'=>'Title is required',
				'bcontent.required'=>'Content is required',
				'img.image'=>'Please upload a valid image'
			);

		return Validator::make($input, $rules, $messages);
	}

	public static function getImage($img,$type = "thumb")
	{
		return $img != '' ? $type.'_'.$img:$type.'_blog_default.jpg';
	}

	public static function archive_html()
	{
		$html = '';

		$qry_get_year = "select YEAR(created_at) as year from blogs group by YEAR(created_at) order by created_at desc";
		$years = DB::select($qry_get_year);

		foreach ($years as $row) 
		{
			$bl = Input::get('year') && Input::get('year') == $row->year ? 'style="display:block;"':'';

			$html .= "<li><p>{$row->year}</p><ul {$bl}>";

			$qry_get_month = "select MONTHNAME(created_at) as month from blogs group by MONTH(created_at) order by created_at";
			$months = DB::select($qry_get_month);

			foreach ($months as $row2)
			{
				$l = URL::to('blog?month='.$row2->month.'&year='.$row->year);

				$html .= "<li><a href='{$l}'>{$row2->month}</a></li>";
			}

			$html .= "</ul></li>";
		}

		return $html;
	}

	public static function disp_arch($yr = "",$mth = "")
	{
		if($yr == '' || $mth == '')
			return self::orderBy('created_at')->get();
		else
		{
			$qry = "
				select * from blogs where MONTHNAME(created_at) = '{$mth}' and YEAR(created_at) = '{$yr}' order by created_at desc
			";

			return DB::select($qry);
		}
	}

}