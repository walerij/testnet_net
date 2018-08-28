<?php


namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class UserinfoForm extends Model
{
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
            [['username', 'password','confirmPassword'], 'required'],
           
           
             
             [['username', 'password','confirmPassword','nickname','fm','name','city'], 'string'],
             
        ];
    }
    
}