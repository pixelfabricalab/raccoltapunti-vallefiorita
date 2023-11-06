<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profilo}}`.
 */
class m231106_111643_add_tipo_sconto_column_valore_sconto_column_to_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profilo}}', 'tipo_sconto', $this->string(16)->defaultValue('percentuale'));
        $this->addColumn('{{%profilo}}', 'valore_sconto', $this->integer(3)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profilo}}', 'tipo_sconto');
        $this->dropColumn('{{%profilo}}', 'valore_sconto');
    }
}
