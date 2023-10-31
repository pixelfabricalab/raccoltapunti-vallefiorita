<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profilo}}`.
 */
class m231031_105416_add_indirizzo_column_cap_column_comune_column_provincia_column_to_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profilo}}', 'indirizzo', $this->string(255)->defaultValue(''));
        $this->addColumn('{{%profilo}}', 'cap', $this->string(16)->defaultValue(''));
        $this->addColumn('{{%profilo}}', 'comune', $this->string(255)->defaultValue(''));
        $this->addColumn('{{%profilo}}', 'provincia', $this->string(64)->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profilo}}', 'indirizzo');
        $this->dropColumn('{{%profilo}}', 'cap');
        $this->dropColumn('{{%profilo}}', 'comune');
        $this->dropColumn('{{%profilo}}', 'provincia');
    }
}
