<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ingredient`.
 */
class m161008_054217_create_ingredient_table extends Migration
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

        $this->createTable('{{%ingredient}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'active' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%ingredient}}');
    }
}
