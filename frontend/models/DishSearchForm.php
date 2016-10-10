<?php
namespace frontend\models;

use yii\base\Model;

class DishSearchForm extends Model
{
    /**
     * @var array
     */
    public $ingredients;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['$ingredients', 'safe'],
        ];
    }

    public function search()
    {
        return '';
    }
}