<?php

use yii\db\Migration;

/**
 * Handles the creation of table `userphoto`.
 */
class m180828_105932_create_userphoto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('userphoto', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'photo_id'=> $this->integer(),
            
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('userphoto');
    }
}
