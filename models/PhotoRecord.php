<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property string $link
 * @property string $info
 */
class PhotoRecord extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'],'integer'],
            [['link', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'info' => 'Info',
        ];
    }

    public function getUser() {
        return $this->hasMany(UserRecord::className(), ['id' => 'user_id'])
                        ->viaTable('userphoto', ['photo_id' => 'id']);
    }

}
