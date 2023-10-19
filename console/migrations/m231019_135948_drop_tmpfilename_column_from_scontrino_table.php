<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%scontrino}}`.
 */
class m231019_135948_drop_tmpfilename_column_from_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%scontrino}}', 'tmpfilename');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%scontrino}}', 'tmpfilename', $this->string());
    }
}
