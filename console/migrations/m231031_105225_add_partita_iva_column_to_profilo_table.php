<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profilo}}`.
 */
class m231031_105225_add_partita_iva_column_to_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profilo}}', 'partita_iva', $this->string(32)->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profilo}}', 'partita_iva');
    }
}
