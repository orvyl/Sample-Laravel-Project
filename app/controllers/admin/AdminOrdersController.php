<?php

class AdminOrdersController extends BaseController {

	public function getIndex()
	{
		$qry = "
			select *, (select count(*) from `order-products` where order_id = orders.id) as numItem, orders.created_at as purchaseDate
			from orders
		";

		return View::make('admin.order.order')
				->with('ptitle','Orders')
				->with('orders',DB::select($qry));
	}

	public function getOrderdetail($id)
	{
		return View::make('admin.order.order-det')
				->with('ptitle','Order detail')
				->with('order',Order::find($id))
				->with('orderProd',OrderProd::where('order_id',$id)->get());
	}

}