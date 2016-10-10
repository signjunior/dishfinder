<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dish */

$this->title = 'Изменение блюда: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="dish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'initIngredients' =>  $initIngredients,
    ]) ?>

</div>
