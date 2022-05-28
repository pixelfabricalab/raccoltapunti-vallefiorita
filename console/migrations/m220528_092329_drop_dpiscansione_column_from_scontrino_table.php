<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%scontrino}}`.
 */
class m220528_092329_drop_dpiscansione_column_from_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%scontrino}}', 'dpiscansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%scontrino}}', 'dpiscansione', $this->integer());
    }
}
