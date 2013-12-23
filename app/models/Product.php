<?php

class Product extends Eloquent {

	protected $fillable = array('short_description','product_details','tags','validity','free_exchange','delivery_date','delivery_cost');

	public static function get_primary($id,$pre = "thumbnail")
	{
		$img = $pre.'_default.jpg';

		$g_img = DB::table('product-images')->where('product_id','=',$id)->where('primary','=',1)->pluck('image');

		if($g_img != '')
			$img = $pre.'_'.$g_img;

		return URL::to('uploads/products/'.$img);
	}

	public static function get_location($id)
	{
		$location = '';

		$g_location = DB::table('location-product')->where('product_id','=',$id)->orderBy('location')->get();
		$num_location = count($g_location);
		if($num_location > 0)
		{
			$ctr = 0;
			foreach ($g_location as $row)
			{
				$ctr++;

				$location .= $row->location;
				$location .= $num_location > $ctr ? ' / ':'';
			}
		}

		return $location;
	}

	public static function get_recipient($id)
	{
		$recipient = '';

		$g_recipient = DB::table('recipient-product')->where('product_id','=',$id)->get();
		$num_recipient = count($g_recipient);
		if($num_recipient > 0)
		{
			$ctr = 0;
			foreach ($g_recipient as $row)
			{
				$ctr++;

				$rec = explode(' ', DB::table('recipient')->where('recipient_id','=',$row->recipient_id)->pluck('recipient'));

				$recipient .= $rec[1];
				$recipient .= $num_recipient > $ctr ? ' / ':'';
			}
		}

		return $recipient;
	}

	public static function validate_products($input)
	{
		$rules = array(
				'product_name'=>'required',
				'short_description'=>'required',
				'product_details'=>'required',
				'price'=>'required',
				'delivery_date'=>'required',
				'delivery_cost'=>'required',
				'categories'=>'required'
			);

		$messages = array(
				'product_name.required'=>'Product Name is required',
				'short_description.required'=>'Short Description is required',
				'product_details.required'=>'Product Details is required',
				'price.required'=>'Price is required',
				'delivery_date.required'=>'Delivery Date is required',
				'delivery_cost.required'=>'Delivery Cost is required',
				'categories.required'=>'Please choose at least one(1) category'
			);

		return Validator::make( $input , $rules, $messages);
	}

	public static function search_product($filter)
	{
		if(count($filter) > 0)
		{
			$listfilter = array();

			$where = ' where '; $order = ' order by p.product_name ';
			$ctr = 0;
			
			if(array_key_exists('location', $filter))
			{
				$where .= " ( ";
				$loc = $filter['location'];

				foreach ($loc as $value)
				{
					$where .= $ctr > 0 ? ' or ':'';
					$where .= " p.id in(select product_id from `location-product` where location = '{$value}') ";
					$ctr = 1;

					$listfilter[] = $value.'|location|'.$value;
				}

				$where .= " ) ";
			}

			if(array_key_exists('recipient', $filter))
			{
				$where .= $ctr == 1 ? " and ":"";

				$where .= " ( ";
				$recipient = $filter['recipient'];
				$ctr = 0;

				foreach ($recipient as $value)
				{
					$where .= $ctr > 0 ? ' or ':'';
					$where .= " p.id in(select product_id from `recipient-product` where recipient_id = '{$value}') ";
					$ctr = 1;

					$listfilter[] = DB::table('recipient')->where('recipient_id','=',$value)->pluck('recipient').'|recipient|'.$value;
				}

				$where .= " ) ";
			}

			if(array_key_exists('pricer', $filter))
			{
				$where .= $ctr == 1 ? " and ":"";

				$where .= " ( ";
				$pricer = $filter['pricer'];
				$ctr = 0;

				foreach ($pricer as $value)
				{
					$where .= $ctr > 0 ? ' or ':'';
					if($value == '501')
					{
						$v = floatval($value);
						$where .= " p.price >= {$v} ";
						$listfilter[] = '$'.$value.'|pricer|'.$value;
					}
					else
					{
						$v = explode('-', $value);
						$num1 = floatval($v[0]);
						$num2 = floatval($v[1]);
						$where .= " p.price between {$num1} and {$num2} ";
						$listfilter[] = '$'.$num1.'-$'.$num2.'|pricer|'.$value;
					}
					$ctr = 1;
				}

				$where .= " ) ";
			}

			if(array_key_exists('occasion', $filter))
			{
				$where .= $ctr == 1 ? " and ":"";

				$where .= " ( ";
				$occasion = $filter['occasion'];
				$ctr = 0;

				foreach ($occasion as $value)
				{
					$where .= $ctr > 0 ? ' or ':'';
					$where .= " p.id in(select product_id from `product-occasion` where occ_id = '{$value}') ";
					$ctr = 1;

					$listfilter[] = DB::table('occasions')->where('id','=',$value)->pluck('occasion_name').'|occasion|'.$value;
				}

				$where .= " ) ";
			}

			if(array_key_exists('occasion-main', $filter))
			{
				$where .= $ctr == 1 ? " and ":"";

				$where .= " ( ";
				$occasion = $filter['occasion-main'];
				$ctr = 0;

				foreach ($occasion as $value)
				{
					$where .= $ctr > 0 ? ' or ':'';
					$where .= " p.id in(select product_id from `product-occasion` po inner join occasions o on po.occ_id = o.id where occasion_type = '{$value}') ";
					$ctr = 1;

					$listfilter[] = DB::table('occasion-types')->where('id','=',$value)->pluck('occasion_type').'|occasion-main|'.$value;
				}

				$where .= " ) ";
			}

			if(array_key_exists('st', $filter))
			{
				$where .= $ctr == 1 ? " and ":"";

				$where .= " ( ";
				$st = $filter['st'];
				$ctr = 0;

				foreach ($st as $value)
				{
					$where .= $ctr > 0 ? ' or ':'';
					$where .= " p.product_name like '%{$value}%' ";
					$ctr = 1;

					$listfilter[] = $value.'|st|'.$value;
				}

				$where .= " ) ";
			}

			if(array_key_exists('sort', $filter))
			{
				if($ctr == 0) $where = '';

				$o = explode(' by ',$filter['sort'][0]);
				$col = $o[0] == 'Name' ? 'product_name':'created_at';
				$st = $o[1] == 'ascending' ? '':'desc';
				$order = " order by p.{$col} {$st}";
			}

			$qry = "select * from products p {$where} {$order}";

			return array(DB::select($qry),$listfilter);
		}
		
		return array(Product::orderBy('created_at','desc')->take(20)->get(),array());
	}

	public static function registryProd($id)
	{
		$qry = "
			select *
			from products p
				inner join `registry-product` rp
					on p.id = rp.prod_id
			where reg_id = '{$id}'
		";

		return DB::select($qry);
	}

}