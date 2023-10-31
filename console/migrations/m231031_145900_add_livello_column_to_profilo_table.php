<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profilo}}`.
 */
class m231031_145900_add_livello_column_to_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profilo}}', 'livello', $this->integer(2)->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profilo}}', 'livello');
    }
}
