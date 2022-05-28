<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%post}}`.
 */
class m220528_091921_drop_dpiscansione_column_from_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%post}}', 'dpiscansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%post}}', 'dpiscansione', $this->integer());
    }
}
