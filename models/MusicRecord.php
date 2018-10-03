<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property int $id
 * @property string $link
 * @property string $info
 */
class MusicRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music';
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
