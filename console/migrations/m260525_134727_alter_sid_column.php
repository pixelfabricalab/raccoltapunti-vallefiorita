<?php

use yii\db\Migration;

class m260525_134727_alter_sid_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%scontrino}}', 'sid', $this->string(36));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%scontrino}}', 'sid', $this->string(32));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260525_134727_alter_sid_column cannot be reverted.\n";

        return false;
    }
    */
}
