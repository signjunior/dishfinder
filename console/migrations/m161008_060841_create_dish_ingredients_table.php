<?php

use yii\db\Migration;

/**
 * Handles the creation for table `dish_ingredients`.
 */
class m161008_060841_create_dish_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%dish_ingredients}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_dish_ingredients_dish_id',
            '{{%dish_ingredients}}',
            'dish_id',
            '{{%dish}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_dish_ingredients_ingredient_id',
            '{{%dish_ingredients}}',
            'ingredient_id',
            '{{%ingredient}}',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_dish_ingredients_dish_id', '{{%dish_ingredients}}');
        $this->dropForeignKey('fk_dish_ingredients_ingredient_id', '{{%dish_ingredients}}');
        $this->dropTable('{{%dish_ingredients}}');
    }
}
