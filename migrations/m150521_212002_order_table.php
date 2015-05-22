<?php

use yii\db\Schema;
use yii\db\Migration;

class m150521_212002_order_table extends Migration
{
    public function up(){
        $this->createTable('orders',[
            'id' => 'pk',
            'order_id' => Schema::TYPE_INTEGER,
            'price' => Schema::TYPE_DECIMAL . ' NOT NULL ',
            'description' => Schema::TYPE_STRING . ' NOT NULL ',
            'available' => 'tinyint',
        ]);
    }

    public function down()
    {
        echo "m150521_212002_order_table cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
