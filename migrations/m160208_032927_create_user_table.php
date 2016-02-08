<?php

use yii\db\Schema;
use yii\db\Migration;

class m160208_032927_create_user_table extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName == 'mysql')
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    	
		$this->createTable(
			'{{%user}}', 
			[
				'id' => Schema::TYPE_PK,
				'username' => Schema::TYPE_STRING . 'NOT_NULL',
				'auth_key' => Schema::TYPE_STRING . '(32) NOT_NULL',
				'password_hash'=> Schema::TYPE_STRING . 'NOT_NULL',
				'password_reset_token' => Schema::TYPE_STRING,
				'email' => Schema::TYPE_STRING . '(64) NOT_NULL',
				'role' => Schema::TYPE_SMALLINT . 'NOT_NULL DEFAULT 1',
				'status' => Schema::TYPE_SMALLINT . 'NOT_NULL DEFAULT 1',
				'created_at' => Schema::TYPE_INTEGER . 'NOT_NULL',
				'update_at' => Schema::TYPE_INTEGER . 'NOT_NULL',
			], $tableOptions
		);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
