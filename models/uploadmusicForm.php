<?php

namespace app\models;


use Yii;
use yii\base\Model;

class uploadForm extends Model {

    public $file;
    public $path;

    public function rules() {
        return [
            // username and password are both required

            [['file'], 'file', 'extensions' => 'mp3, wav',
                'skipOnEmpty' => false              
                ],
             [['path'], 'string', 'max' => 1255]
            ];
            
        
    }

}