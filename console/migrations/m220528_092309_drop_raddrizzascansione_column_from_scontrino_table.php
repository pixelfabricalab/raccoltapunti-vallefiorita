<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%scontrino}}`.
 */
class m220528_092309_drop_raddrizzascansione_column_from_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%scontrino}}', 'raddrizzascansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%scontrino}}', 'raddrizzascansione', $this->integer());
    }
}
