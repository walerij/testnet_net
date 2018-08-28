<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userinfo".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nickname
 * @property string $fm
 * @property string $name
 * @property string $city
 */
class UserinfoRecord extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'userinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nickname', 'fm', 'name', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nickname' => 'Nickname',
            'fm' => 'Fm',
            'name' => 'Name',
            'city' => 'City',
        ];
    }

    public function setUserinfo($newUser) {
        $this->user_id = $newUser->user_id;
        $this->nickname = $newUser->nickname;
        $this->fm = $newUser->fm;
        $this->name = $newUser->name;
        $this->city = $newUser->city;
    }

}
