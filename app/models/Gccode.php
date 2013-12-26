<?php

class Gccode extends Eloquent {
	protected $table = "giftcerts-code";

	public static function getGcs($id) {
		$qry = "select * from `giftcerts-code` gcc inner join `gift-certificates` gc on gcc.gc_id = gc.id where user_id = '{$id}'";

		return DB::select($qry);
	}
}