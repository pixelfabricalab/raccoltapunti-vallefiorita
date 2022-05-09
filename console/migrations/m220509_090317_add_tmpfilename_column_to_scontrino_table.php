<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%scontrino}}`.
 */
class m220509_090317_add_tmpfilename_column_to_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%scontrino}}', 'tmpfilename', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%scontrino}}', 'tmpfilename');
    }
}
