<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserinfoForm;
use app\models\UserinfoRecord;
use app\models\UserRecord;

class UserController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        return $this->render('index');
    }

    public function actionAdduser() {

        $model = new UserinfoForm();

        if ($model->load(Yii::$app->request->post()))// если данные пришли через post             
            if ($model->validate()) 
            {
                //рег данные
                $SaveNewUserRecord = new UserRecord();
                $SaveNewUserRecord->setNewUser($model);
                $SaveNewUserRecord->save(); //сохранили рег данные
                //теперь информация о пользователе
                $SaveNewUserinfoRecord = new UserinfoRecord();
               
                $SaveNewUserinfoRecord->setUserinfo($model,$SaveNewUserRecord->id);
                $SaveNewUserinfoRecord->save(); //сохранили информацию о пользователе
                $this->redirect("/site/login");
                
            }
        return $this->render('adduser', ['model' => $model,]);
    }

}
