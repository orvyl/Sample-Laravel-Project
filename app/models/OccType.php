<?php

class OccType extends Eloquent {

	protected $table = "occasion-types";

	public static function val($input)
	{
		return Validator::make($input, 
			array(
				'occasion_type'=>'required',
				'description'=>'required'
				),
			array(
				'occasion_type.required'=>'Occasion type is required',
				'description.required'=>'Description is required'
				)
			);
	}
}