<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>-->

<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#panel1">Данные регистрации</a></li>
    <li><a data-toggle="tab" href="#panel2">Дополнительно</a>

    </li>

</ul>
<div class="tab-content">
    <div id="panel1" class="tab-pane fade in active">
        <h3>Данные авторизации</h3>
        <div class="col-lg-6 col-md-6">  
            
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <?= $form->field($model, 'confirmPassword')->passwordInput()->label('Подтвердить пароль') ?>
        </div> 
        <div class="col-lg-6 col-md-6">
            <?= $form->field($model, 'nickname')->textInput()->label('Ник') ?>
            <?= $form->field($model, 'fm')->textInput()->label('Фамилия') ?>
            <?= $form->field($model, 'name')->textInput()->label('Имя') ?>
            <?= $form->field($model, 'city')->textInput()->label('Город') ?>
        </div>   
    </div>
    <div id="panel2" class="tab-pane fade">
        <h3>Данные о пользователе</h3>
        <p>Поля</p>
    </div>

</div>
<button type="submit" name="user-submit" class="btn btn-info">
    Сохранить
</button>
<?php ActiveForm::end(); ?>




