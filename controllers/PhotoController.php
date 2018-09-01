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
use app\models\PhotoRecord;
use app\models\UserphotoRecord;
use app\models\UserRecord;

class PhotoController extends Controller {

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
        $id = 1;
        $MyPhoto = PhotoRecord::find()->where(['id' => $id])->one();
        return $this->render('index', ['model' => $MyPhoto]
        );
    }

    public function actionAdd() {

        return $this->render('addphoto');
    }

    public function actionAddlink() {
        //добавление связи
        $session = Yii::$app->session;


        //return $this->render('index');
    }

    private function addUserPhotoLink($id = 1) {

        $MyPhoto = PhotoRecord::find()->where(['id' => $id])->one();


        $userPhoto = new UserphotoRecord();
        $userPhoto->user_id = $session['__id'];
        $userPhoto->photo_id = $MyPhoto->id;
        $userPhoto->save();
    }

}
