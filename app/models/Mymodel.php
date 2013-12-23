<?php
/*
|	TITLE: Mymodel
|	DESCRIPTION: General model for Mindblow Ideas (laravel)
|	AUTHOR: Orvyl "Pogi" Tumaneng ( orvyl@mindblowideas.com / orvyl.t@gmail.com )
*/
class Mymodel {

	public static function select_table($table) {
		return DB::table($table)->get();
	}

	public static function get_select_string($table,$condition) {
		$numcond = count($condition);
		$x = 0;
		$qry = "select * from `{$table}` where ";
		foreach ($condition as $key => $value) {
			$qry .= " `{$key}` = '{$value}' ";
			if($numcond != $x+1)
				$qry .= " and ";
			$x++;
		}

		return $qry;
	}

	/****SELECT with given operator*****/
	public function select_where_op($table,$col,$val,$op) {
		return DB::table($table)->where($col,$op,$val)->first();
	}

	public static function select_where_res_op($table,$col,$val,$op) {
		return DB::table($table)->where($col,$op,$val);
	}
	/*END*/



	/****SELECT with no operator (defaul: = )*****/
	public static function select_where($table,$col,$val) {
		return DB::table($table)->where($col,$val)->first();
	}

	public static function select_where_res($table,$col,$val) {
		return DB::table($table)->where($col,$val)->get();
	}
	/*END*/




	/****NATIVE SELECT (Base from our CI My_model) ***/
	public static function ci_select_where($table,$condition){
		return DB::select(self::get_select_string($table,$condition));
	}

	public function ci_select_order($table,$order,$type = '') {
		return DB::select("select * from `{$table}` order by {$order} {$type}");
	}

	public static function ci_select_where_order($table,$condition,$order,$type = '') {
		$qry = self::get_select_string($table,$condition)." order by {$order} {$type}";

		return DB::select($qry);
	}
	/*END*/

	public static function count_where($table,$col,$val,$op = '=')
	{
		return DB::table($table)->where($col,$op,$val)->count();
	}



	public static function insert($table,$data) {
		return DB::table($table)->insert($data);
	}

	public static function update($table,$update,$where_col,$where_ans,$op = '=') {
		return DB::table($table)->where($where_col,$op,$where_ans)->update($update);
	}

	public static function delete($table,$col,$val,$op = '=')
	{
		return DB::table($table)->where($col,$op,$val)->delete();
	}
}