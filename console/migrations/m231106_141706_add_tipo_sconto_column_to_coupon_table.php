<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%coupon}}`.
 */
class m231106_141706_add_tipo_sconto_column_to_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%coupon}}', 'tipo_sconto', $this->string(16)->defaultValue('percentuale'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%coupon}}', 'tipo_sconto');
    }
}
