<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%scontrino}}`.
 */
class m231031_144213_add_indirizzo_column_to_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%scontrino}}', 'indirizzo', $this->string(255)->defaultValue(''));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%scontrino}}', 'indirizzo');
    }
}
