<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usermusic".
 *
 * @property int $id
 * @property int $user_id
 * @property int $music_id
 */
class UsermusicRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usermusic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'music_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'music_id' => 'Music ID',
        ];
    }
    
     public function getUser() {
        return $this->hasMany(UserRecord::className(), ['id' => 'user_id']);
      }
       public function getMusic() {
        return $this->hasMany(MusicRecord::className(), ['id' => 'music_id']);
      }
}
