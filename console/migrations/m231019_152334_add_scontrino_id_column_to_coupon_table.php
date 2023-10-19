<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%coupon}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%scontrino}}`
 */
class m231019_152334_add_scontrino_id_column_to_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%coupon}}', 'scontrino_id', $this->integer());

        // creates index for column `scontrino_id`
        $this->createIndex(
            '{{%idx-coupon-scontrino_id}}',
            '{{%coupon}}',
            'scontrino_id'
        );

        // add foreign key for table `{{%scontrino}}`
        $this->addForeignKey(
            '{{%fk-coupon-scontrino_id}}',
            '{{%coupon}}',
            'scontrino_id',
            '{{%scontrino}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%scontrino}}`
        $this->dropForeignKey(
            '{{%fk-coupon-scontrino_id}}',
            '{{%coupon}}'
        );

        // drops index for column `scontrino_id`
        $this->dropIndex(
            '{{%idx-coupon-scontrino_id}}',
            '{{%coupon}}'
        );

        $this->dropColumn('{{%coupon}}', 'scontrino_id');
    }
}
