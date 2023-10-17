<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%scontrino}}`.
 */
class m231013_125455_add_filename_column_to_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%scontrino}}', 'filename', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%scontrino}}', 'filename');
    }
}
