<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Dish */

$this->title = 'Создание блюда';
$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'initIngredients' =>  [],
    ]) ?>

</div>
