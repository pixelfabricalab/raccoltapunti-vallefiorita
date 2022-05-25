<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%scontrino}}`.
 */
class m220525_094725_add_modoscansione_column_to_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%scontrino}}', 'modoscansione', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%scontrino}}', 'modoscansione');
    }
}
