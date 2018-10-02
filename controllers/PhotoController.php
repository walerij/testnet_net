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
use app\models\uploadForm;
use yii\web\UploadedFile;


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
        //
        //$orders = Order::find()->joinWith('books.author')->all();
        $session = Yii::$app->session;

        $MyPhoto = UserphotoRecord::find()
                ->where(['user_id' => $session['__id']])
                ->all();
        //->where(['id' => $id])->one();
        return $this->render('index', ['model' => $MyPhoto]
        );
    }

    public function actionAdd() {

        $model = new UploadForm();
        if (Yii::$app->request->post()) {
            
            //закачка файла
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                //если модель валидная
                //1. загружаем файл на сервер
                $path = Yii::$app->params['pathUploads'] . 'photos/';
                //$model->file->saveAs($path . $model->file);
                $model->file->saveAs($path . time() . '.' . $model->file->getExtension());
                $model->path = $path . time() . '.' . $model->file->getExtension();
                $model_name =  time() . '.' . $model->file->getExtension(); //имя файла сохраняем
                
                //2. имя файла сохраняем в базу данных - в коллекцию фото
                $photo = new PhotoRecord();
                $photo->link = $model_name;
                $photo->info='';
                $photo->save();
                
                //3. сохраняем связь в userphoto
                
                $this->addUserPhotoLink($photo->id);                
                //
                $this->redirect("/photo/index");
                
                
                
                
            }
        }
        return $this->render('addphoto', ['model' => $model]);
    }

    public function actionAddlink() {
        //добавление связи
        $session = Yii::$app->session;


        //return $this->render('index');
    }

    

    private function addUserPhotoLink($id = 1) {
        
        $session = Yii::$app->session;
        $MyPhoto = PhotoRecord::find()->where(['id' => $id])->one();


        $userPhoto = new UserphotoRecord();
        $userPhoto->user_id = $session['__id'];
        $userPhoto->photo_id = $MyPhoto->id;
        $userPhoto->save();
    }

}
