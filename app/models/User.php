<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array('first_name','last_name','active','usertype','birthday','country','state','phone');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function client_validation( $input,$editing = false, $withpassword = true )
	{
		$rules = array(
				'first_name'=>'required',
				'last_name'=>'required',
				'birthday'=>'required',
				'country'=>'required'
			);

		if(!$editing)
		{
			$rules['email'] = 'required|unique:users,email|confirmed';
			$rules['agree'] = 'required';
		}
		else
		{
			$rules['email'] = 'required|unique:users,email,'.Auth::user()->id;
		}

		if($withpassword)
		{
			$rules['password'] = 'required|min:6|confirmed';
			$rules['old_password'] = 'required';
		}

		$msg = array(
			'email'=>array(
					'email'=>'Given email is not an email address',
					'unique'=>'*given email is already registered',
					'confirmed'=>'*email mismatch'
				),
			'pwd'=>array(
					'confirmed'=>'*password mismatch'
				),
			'agree'=>array(
					'required'=>'*you must agree to our Terms and Conditions'
				)
		);

		return Validator::make( $input , $rules , $msg);
	}

	public static function admin_validation( $input )
	{
		$rules = array(
				'username'=>'required|unique:users,username|min:3',
				'email'=>'required|unique:users,email',
				'first_name'=>'required',
				'last_name'=>'required',
				'password'=>'required|min:6|confirmed'
			);

		return Validator::make( $input , $rules );
	}

}