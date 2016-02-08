<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

	public static function tablename()
	{
		return '{{%user}}';
	}
	
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'update_at',
				'value' => new Expression('NOW()'),
			],
		];
	}

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    public function setPassword($password)
    {
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    public function findByEmail($email)
    {
    	return static::findOne(['email' => $email]);
    }
    
    public function findByUserName($username)
    {
    }
    
    public function generatePasswordResetToken()
    {
    	$this->reset_token = Yii::$app->security->generateRandomString(). '_' . time();
    }
    
    public function removePasswordResetToken()
    {
    	$this->reset_token = null;
    }
    
    public static function isPasswordResetTokenValid($token)
    {
    	if (empty($token)) {
    		return false;
    	}
    	 
    	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
    	$parts = explode('_', $token);
    	$timeStamp = (int) end($parts);
    	 
    	return $timeStamp - $expire >= time();
    }
}
