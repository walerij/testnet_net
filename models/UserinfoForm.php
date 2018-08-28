<?php


namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;


class UserinfoForm extends Model
{
    public $user_id;
    public $username;
    public $password;
    public $confirmPassword;
    
    public $nickname;
    public $fm;
    public $name;
    public $city;

    public function rules() {
         return [
            // username and password are both required
            [['username','user_id', 'password','confirmPassword'], 'required','message' => 'Поле не должно быть пустым'],
                          
             [['username', 'password','confirmPassword','nickname','fm','name','city'], 'string'],
             ['confirmPassword', 'compare', 'compareAttribute' => 'password','message' => 'Поля "пароль" и "Подтверждение пароля" должны совпадать'],
             
        ];
    }
    
}