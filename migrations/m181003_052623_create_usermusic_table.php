<?php

use yii\db\Migration;

/**
 * Handles the creation of table `usermusic`.
 */
class m181003_052623_create_usermusic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usermusic', [
            'id' => $this->primaryKey(),
             'user_id' => $this->integer(),
             'music_id'=> $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usermusic');
    }
}
