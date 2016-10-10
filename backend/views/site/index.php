<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Добро пожаловать!</h2>

        <p class="lead">Панель администрирования модуля выборки блюд по ингредиентам.</p>

        <p>
            <?= yii\helpers\Html::a('Перейти к блюдам', ['dish/index'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

</div>
