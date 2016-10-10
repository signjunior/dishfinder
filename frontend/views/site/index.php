<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\IngredientSearch;
use common\models\Ingredient;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выбор блюд по ингредиентам';
?>
<div class="site-index">
    <?php
    $r = ArrayHelper::map(Ingredient::find()->asArray()->all(), 'id', 'name')
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="filter-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo Select2::widget([
            'name' => 'ingredients[]',
            'value' => '',
            'data' => ArrayHelper::map(Ingredient::find()->asArray()->all(), 'id', 'name'),
            'options' => ['multiple' => true, 'placeholder' => 'Выберите ...', 'allowClear' => true],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
