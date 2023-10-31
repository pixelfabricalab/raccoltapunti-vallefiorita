<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%coupon}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m231031_155247_add_esercente_id_column_to_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%coupon}}', 'esercente_id', $this->integer()->null());

        // creates index for column `esercente_id`
        $this->createIndex(
            '{{%idx-coupon-esercente_id}}',
            '{{%coupon}}',
            'esercente_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-coupon-esercente_id}}',
            '{{%coupon}}',
            'esercente_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-coupon-esercente_id}}',
            '{{%coupon}}'
        );

        // drops index for column `esercente_id`
        $this->dropIndex(
            '{{%idx-coupon-esercente_id}}',
            '{{%coupon}}'
        );

        $this->dropColumn('{{%coupon}}', 'esercente_id');
    }
}
