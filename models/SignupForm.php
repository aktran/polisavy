<?php
namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
	public $firstName;
	public $lastName;
	public $email;
	public $password;
	public $passwordRepeat;
	
	private $_user = false;
	
	public function rules() 
	{
		return [
			[['email', 'firstName', 'lastName', 'password', 'passwordRepeat'], 'required'],
			['email', 'email'],
			['password', 'string', 'length' => [6, 64]],
			['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
		];
	}
	
	public function attributeLabels() 
	{
		return [
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'passwordRepeat' => 'Re-enter Password',
		];	
	}
	
	public function signup()
	{
		if ($this->validate())
		{
			$this->_user = new User();
			$this->_user->username = $this->firstName . ' ' . $this->lastName;
			$this->_user->email = $this->email;
			$this->_user->setPassword($this->password);
			$this->_user->generateAuthenticationKey();
			
			if ($this->_user->save(false))
			{
				return $this->_user;
			}
		}
		
		return null;
	}
}