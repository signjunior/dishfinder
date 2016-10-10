<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dish_ingredients".
 *
 * @property integer $id
 * @property integer $dish_id
 * @property integer $ingredient_id
 *
 * @property Ingredient $ingredient
 * @property Dish $dish
 */
class DishIngredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dish_ingredients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dish_id', 'ingredient_id'], 'required'],
            [['dish_id', 'ingredient_id'], 'integer'],
//            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::className(), 'targetAttribute' => ['ingredient_id' => 'id']],
//            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dish_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::className(), ['id' => 'ingredient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::className(), ['id' => 'dish_id']);
    }
}
