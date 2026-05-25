<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m260525_150000_add_access_token_column_to_user_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string(64)->null()->unique());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'access_token');
    }
}
