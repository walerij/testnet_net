<?php

use yii\db\Migration;

/**
 * Handles the creation of table `userinfo`.
 */
class m180826_193419_create_userinfo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('userinfo', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer()->notNull(),
            'nickname'=> $this->string(),
            'fm'=> $this->string(),
            'name'=> $this->string(),
            'city'=> $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('userinfo');
    }
}
