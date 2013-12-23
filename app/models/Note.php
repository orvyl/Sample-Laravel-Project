<?php

class Notes extends Eloquent {

	public static function validate( $input )
	{
		$rules = array(
				'title'=>'required',
				'details'=>'required|min:5',
				'type'=>'required'
			);

		return Validator::make($input, $rules);
	}

}