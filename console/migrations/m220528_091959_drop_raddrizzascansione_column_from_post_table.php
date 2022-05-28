<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%post}}`.
 */
class m220528_091959_drop_raddrizzascansione_column_from_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%post}}', 'raddrizzascansione');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%post}}', 'raddrizzascansione', $this->integer());
    }
}
