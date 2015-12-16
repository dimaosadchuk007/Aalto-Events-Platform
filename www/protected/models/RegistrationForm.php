<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{
	public $username;
	public $password;
	public $email;
	public $login;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, email, login', 'required'),
			 // make sure username and email are unique
 			array('email, login', 'unique'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		 return array(
                        'username'=>'Your username',
                        'password'=>'Your password',
                        'email'=>'Your email',
                        'login'=>'Your login',
                );
	}
}
