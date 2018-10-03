<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

    $this->title = 'Музыка';
    $this->params['breadcrumbs'][] = $this->title;
?>


<audio controls>
 
  <source src="music/1.mp3" type="audio/mpeg">
  <a href="music/1.mp3">Скачать name.mp3</a>
</audio>