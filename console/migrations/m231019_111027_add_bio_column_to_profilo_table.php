<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profilo}}`.
 */
class m231019_111027_add_bio_column_to_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profilo}}', 'bio', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profilo}}', 'bio');
    }
}
