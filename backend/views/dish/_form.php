<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Dish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingredients_ids')->widget(Select2::classname(),[
        'options' => ['placeholder' => 'Выберите ингридиенты...', 'multiple' => true],
        'initValueText' => $initIngredients,
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 2,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Загрузка результатов...'; }"),
            ],
            'ajax' => [
                'url' => \yii\helpers\Url::to(['ingredient/list']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(ingredient) { return ingredient.text; }'),
            'templateSelection' => new JsExpression('function (ingredient) { return ingredient.text; }'),
        ],
    ])->label($model->getAttributeLabel('ingredients'))
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
