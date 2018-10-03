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
use app\models\MusicRecord;
use app\models\UsermusicRecord;
use app\models\uploadmusicForm;


class MusicController extends Controller {

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

        $MyMusic = UsermusicRecord::find()
                ->where(['user_id' => $session['__id']])
                ->all();
        //->where(['id' => $id])->one();
        return $this->render('index'
                , ['model' => $MyMusic]
        );
    }

    //добавление файла
    public function actionAdd() {

        $model = new uploadmusicForm();
        if (Yii::$app->request->post()) {
            
            //закачка файла
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                //если модель валидная
                //1. загружаем файл на сервер
                $path = Yii::$app->params['pathUploads'] . 'music/';
                $model_name_old=$model->file->baseName;
                //$model->file->saveAs($path . $model->file);
                $model->file->saveAs($path . time() . '.' . $model->file->getExtension());
                $model->path = $path . time() . '.' . $model->file->getExtension();
                $model_name =  time() . '.' . $model->file->getExtension(); //имя файла сохраняем
                
                //2. имя файла сохраняем в базу данных - в коллекцию музыки
                $music = new MusicRecord();
                $music->link = $model_name;
                $music->info=''.$model_name_old;
                $music->save();
                
                //3. сохраняем связь в usermusic
                
                $this->addUserMusicLink($music->id);                
                //
                $this->redirect("/music/index");
                
                
                
                
            }
        }
        return $this->render('add', ['model' => $model]);
    }

    public function actionAddlink() {
        //добавление связи
        $session = Yii::$app->session;


        //return $this->render('index');
    }

    

    private function addUserMusicLink($id = 1) {
        
        $session = Yii::$app->session;
        $MyMusic = MusicRecord::find()->where(['id' => $id])->one();


        $userMusic = new UsermusicRecord();
        $userMusic->user_id = $session['__id'];
        $userMusic->music_id = $MyMusic->id;
        $userMusic->save();
    }

}
