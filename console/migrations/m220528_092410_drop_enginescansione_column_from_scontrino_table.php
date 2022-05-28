<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%scontrino}}`.
 */
class m220528_092410_drop_enginescansione_column_from_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%scontrino}}', 'enginescansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%scontrino}}', 'enginescansione', $this->integer());
    }
}
