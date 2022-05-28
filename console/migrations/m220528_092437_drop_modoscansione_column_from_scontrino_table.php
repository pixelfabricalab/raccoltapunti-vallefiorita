<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%scontrino}}`.
 */
class m220528_092437_drop_modoscansione_column_from_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%scontrino}}', 'modoscansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%scontrino}}', 'modoscansione', $this->integer());
    }
}
