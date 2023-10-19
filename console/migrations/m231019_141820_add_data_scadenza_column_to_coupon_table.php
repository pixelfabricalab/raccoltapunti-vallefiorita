<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%coupon}}`.
 */
class m231019_141820_add_data_scadenza_column_to_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%coupon}}', 'data_scadenza', $this->date()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%coupon}}', 'data_scadenza');
    }
}
