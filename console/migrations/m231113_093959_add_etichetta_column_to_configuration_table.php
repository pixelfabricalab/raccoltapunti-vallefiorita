<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%configuration}}`.
 */
class m231113_093959_add_etichetta_column_to_configuration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%configuration}}', 'etichetta', $this->string()->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%configuration}}', 'etichetta');
    }
}
