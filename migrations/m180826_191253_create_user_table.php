<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180826_191253_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     * таблица user - чисто для аутентификации
     * и авторизации. Здесь имя пользователя, пароль,
     * ключ и токен
     * 
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),            
            'username'=> $this->string(),
            'password'=> $this->string(),
            'auth_key'=>$this->string(),
            'access_token'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
