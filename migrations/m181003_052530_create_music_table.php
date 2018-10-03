<?php

use yii\db\Migration;

/**
 * Handles the creation of table `music`.
 */
class m181003_052530_create_music_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('music', [
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
        $this->dropTable('music');
    }
}
