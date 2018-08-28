<?php

use yii\db\Migration;

/**
 * Handles the creation of table `photo`.
 */
class m180828_105219_create_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'link' => $this->string(),
            'info'=> $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('photo');
    }
}
