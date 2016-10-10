<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блюда';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать блюдо', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'ingredients',
                'format' => 'raw',
                'value' => function ($model) {
                    $ingredients = $model->getIngredients()->all();
                    $result = '';
                    foreach ($ingredients as $item) {
                        if ($result) {
                            $result .= Html::tag('br');
                        }
                        $result .= Html::tag('span', $item->name, ['class' => 'btn btn-default btn-xs']);

                    }
                    return $result;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
