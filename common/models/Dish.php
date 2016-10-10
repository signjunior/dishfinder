<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $name
 *
 * @property DishIngredients[] $dishIngredients
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    private $_ingredient_ids;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            ['ingredients_ids', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'ingredients' => 'Ингредиенты',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])
            ->viaTable(DishIngredients::tableName(), ['dish_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $relatedRecords = $this->getRelatedRecords();
        if (isset($relatedRecords['ingredients'])) {
            $this->unlinkAll('ingredients', true);
            foreach ($relatedRecords['ingredients'] as $item) {
                $this->link('ingredients', $item);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        $this->_ingredient_ids = [];

        /**
         * @var \common\models\Activity[]
         */
        $items = $this->getIngredients()->all();

        foreach ($items as $item) {
            $this->_ingredient_ids[] = $item->id;
        }
    }

    /**
     * @param integer[] $ids
     */
    public function setIngredients_ids($ids)
    {
        if (empty($ids) || !is_array($ids)) {
            $ids = [];
        }
        $this->_ingredient_ids = $ids;
        $items = [];
        foreach ($ids as $id) {
            $result = Ingredient::findOne($id);
            if ($result !== null) {
                $items[] = $result;
            }
        }
        $this->populateRelation('ingredients', $items);
    }

    /**
     * @return integer[]
     */
    public function getIngredients_ids()
    {
        return $this->_ingredient_ids;
    }
}
