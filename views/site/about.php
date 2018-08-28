<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О проекте';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Социальная сеть testnet. Версия 0.0.0.1alpha
    </p>

    <h3>История версий</h3>
    <p>
        
        <ul class="list-group list-unstyled">
            <li class="list-group-item">
                <strong>Версия 0.0.0.1beta</strong>
                
            </li>    
              <li class="list-group-item">
                <strong>Версия 0.0.0.1alpha</strong>
                    <p>
                        Проект на Yii2, ЧПУ, база пользователей,
                        авторизация, модель информации о пользователях
                    </p>
                
            </li>    
              
        </ul>
    
    </p>


</div>
