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

<div class="row">

    
    <a href="/music/add" title="Добавить музыку" class="btn btn-success">Добавить</a>
</div>


<?php
foreach ($model as $m)
    
    foreach ($m->music as $music) { ?>

        <h3><?= $music->info ?></h3>
        <audio controls>
          <source src="<?= $music->link ?>" type="audio/mpeg">
          <a href="<?= $music->link ?>">Скачать name.mp3</a>
        </audio>

<?php
     }
   
   
?>