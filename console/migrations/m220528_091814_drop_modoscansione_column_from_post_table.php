<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%post}}`.
 */
class m220528_091814_drop_modoscansione_column_from_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%post}}', 'modoscansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%post}}', 'modoscansione', $this->integer());
    }
}
