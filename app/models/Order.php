<?php

class Order extends Eloquent {

	protected $table = "orders";

	public static function getTotalAmountItem($id)
	{
		return OrderProd::where('order_id',$id)->sum('total_price');
	}

}