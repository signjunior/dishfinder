<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ingredient}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'integer'],
            [['active'], 'default', 'value' => 1],
            [['active'], 'in', 'range' => [0, 1]],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'active' => 'Активность',
        ];
    }
}
