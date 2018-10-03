<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Добавление музыкальной композиции';
$this->params['breadcrumbs'][] = $this->title;
?>

        <?php
            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        ?>



        <?= $form->field($model, 'file')->fileInput() ->label('Выбор музыкального файла') ?>

        
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
