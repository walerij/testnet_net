<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userphoto".
 *
 * @property int $id
 */
class UserphotoRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userphoto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['photo_id'], 'integer'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'USER_ID',
            'photo_id' => 'PHOTO_ID',
        ];
    }
    
      public function getUser() {
        return $this->hasMany(UserRecord::className(), ['id' => 'user_id']);
      }
       public function getPhoto() {
        return $this->hasMany(PhotoRecord::className(), ['id' => 'photo_id']);
      }
}
