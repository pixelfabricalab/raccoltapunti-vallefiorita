<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%configuration}}`.
 */
class m231113_090727_create_configuration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%configuration}}', [
            'id' => $this->primaryKey(),
            'cfg_key' => $this->string()->notNull(),
            'cfg_val' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%configuration}}');
    }
}
