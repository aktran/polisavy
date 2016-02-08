<?php

use yii\db\Schema;
use yii\db\Migration;

class m160208_052417_create_profile_table extends Migration
{
    public function up()
    {
		$tableOptions = null;
		if ($this->db->driverName == 'mysql')
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		
		$this->createTable(
			'{{%profile}}', 
			[
				'id' => Schema::TYPE_PK,
				'display_name' => Schema::TYPE_STRING . '(64) NOT_NULL',
				'address' => Schema::TYPE_STRING . '(64) NOT_NULL',
				'city' => Schema::TYPE_STRING . '(64) NOT_NULL',
				'state' => Schema::TYPE_STRING . '(2) NOT_NULL',
				'zip' => Schema::TYPE_SMALLINT . 'NOT_NULL'
			], $tableOptions
		);
    }

    public function down()
    {
        echo "m160208_052417_create_profile_table cannot be reverted.\n";

        return false;
    }
}
