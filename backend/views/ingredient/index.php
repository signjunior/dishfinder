<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IngredientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ингредиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать ингредиент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'active',
                'value' => function ($model) {
                    return $model->active == 0 ? 'Нет' : 'Да';
                },
                'filter' => [0 => 'Нет', 1 => 'Да'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
