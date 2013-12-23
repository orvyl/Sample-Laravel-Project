<?php

class Rate extends Eloquent {

	protected $table = "rates";

	public static function getAllRates($id)
	{
		$qry = "
			select count(*) as votes,avg(score_quality) as quality,avg(score_value) as value,avg(score_service) as service,avg(score_fun) as fun
			from rates
			where product_id = '{$id}'
		";

		$result = DB::select($qry);

		$r_quality = $result[0]->quality ? $result[0]->quality:0;
		$r_value = $result[0]->value ? $result[0]->value:0;
		$r_service = $result[0]->service ? $result[0]->service:0;
		$r_fun = $result[0]->fun ? $result[0]->fun:0;

		return array(
				'votes'=>$result[0]->votes,
				'quality'=>intval($r_quality),
				'value'=>intval($r_value),
				'service'=>intval($r_service),
				'fun'=>intval($r_fun),
				'overall'=> ($r_fun + $r_service + $r_value + $r_quality) / 4
			);
	}

	public static function allowToRate($pid)
	{
		if(Auth::check())
		{
			if(self::where('user_id',Auth::user()->id)->where('product_id',$pid)->count() == 0)
				return true;
		}

		return false;
	}

	public static function allReviews($id)
	{
		$qry = "
			select *,(score_quality+score_value+score_service+score_fun)/4 as votes,r.created_at as date_posted
			from rates r
				inner join users u
					on r.user_id = u.id
			where product_id = '{$id}'
		";

		return DB::select($qry);
	}

}