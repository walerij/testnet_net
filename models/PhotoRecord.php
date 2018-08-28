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
class PhotoRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'info' => 'Info',
        ];
    }
}
