<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profilo}}`.
 */
class m231031_105041_add_ragione_sociale_column_to_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profilo}}', 'ragione_sociale', $this->string(255)->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profilo}}', 'ragione_sociale');
    }
}
