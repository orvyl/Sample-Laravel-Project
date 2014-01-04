<?php

class Registry extends Eloquent {

	protected $table = "registry";

	protected $fillable = array('address','suburb','country_id','state_id','postcode','contact','currency','code','registry_title','registry_welcome');

	public static function validate_personal($input)
	{
		$rules = array(
				'occasion_type'=>'required',
				'first_name'=>'required',
				'last_name'=>'required',
				'birthday'=>'required|date',
				'address'=>'required',
				'country'=>'required',
				'email'=>'required|email',
				'date_party'=>'required|date',
				'cc'=>'required',
				'registry_currency'=>'required',
				'agree'=>'required'
			);

		if($input['cc'] == 'notsame')
		{
			$rules['delivery_address'] = 'required';
			$rules['delivery_suburb'] = 'required';
			$rules['delivery_country'] = 'required';
			if($input['delivery_country'] == 1)
				$rules['delivery_state'] = 'required';
		}

		if($input['country'] == 1)
			$rules['state'] = 'required';			

		$msg = array(
				'agree.required'=>'You must accept Terms and Conditions'
			);

		return Validator::make($input, $rules,$msg);
	}

	public static function validate_marriage($input)
	{
		$rules = array(
				'occasion_type'=>'required',
				'bride_fname'=>'required',
				'bride_lname'=>'required',
				'groom_fname'=>'required',
				'groom_lname'=>'required',
				'address'=>'required',
				'country'=>'required',
				'email'=>'required|email',
				'date_party'=>'required|date',
				'cc'=>'required',
				'registry_currency'=>'required',
				'agree'=>'required',
				'couple_type'=>'required'
			);

		if($input['cc'] == 'notsame')
		{
			$rules['delivery_address'] = 'required';
			$rules['delivery_suburb'] = 'required';
			$rules['delivery_country'] = 'required';
			if($input['delivery_country'] == 1)
				$rules['delivery_state'] = 'required';
		}

		if($input['country'] == 1)
			$rules['state'] = 'required';			

		$msg = array(
				'agree.required'=>'You must accept Terms and Conditions'
			);

		return Validator::make($input, $rules,$msg);
	}

	public static function createCode($id)
	{
		return $id.'-'.date('mydHis').Mylibrary::random_char(6);
	}

	public static function addressFormat($registry)
	{
		$add = $registry->postcode.' '.$registry->address.' ';
		$add .= DB::table('state')->where('state_id',$registry->state_id)->pluck('state').' ';
		$add .= DB::table('country')->where('country_id',$registry->id)->pluck('country').' ';
		$add .= $registry->suburb != '' ? '(suburb: '.$registry->suburb.')':'';
		return $add;
	}

	public static function sumContribution($id)
	{
		return DB::table('contributions')->where('registry_id',$id)->sum('contribution');
	}

	public static function totalAmount($id)
	{
		$totalAmountProd = DB::select("
				select sum(price) as theSum
				from products
				where id in (
						select prod_id from `registry-product` where reg_id = '{$id}'
					)
			");

		$totalAmountWish = Wishlist::where('registry_id',$id)->sum('wish_amount');

		return $totalAmountProd[0]->theSum + $totalAmountWish;
	}

	public static function totalContribution($id)
	{
		return DB::table('contributions')->where('registry_id',$id)->sum('contribution');
	}

	public static function getPercentPaid($id)
	{
		$totalAmountProd = DB::select("
				select sum(price) as theSum
				from products
				where id in (
						select prod_id from `registry-product` where reg_id = '{$id}'
					)
			");

		$totalAmountWish = Wishlist::where('registry_id',$id)->sum('wish_amount');

		$totalAmount = $totalAmountProd[0]->theSum + $totalAmountWish;

		$totalContri = DB::table('contributions')->where('registry_id',$id)->sum('contribution');

		$forperce = (($totalContri/$totalAmount) * 100) > 100 ? 100:($totalContri/$totalAmount) * 100;

		return round($forperce, 2);
	}
}