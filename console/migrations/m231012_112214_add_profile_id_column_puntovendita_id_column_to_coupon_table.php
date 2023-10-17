<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%coupon}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%puntovendita}}`
 */
class m231012_112214_add_profile_id_column_puntovendita_id_column_to_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%coupon}}', 'profile_id', $this->integer()->notNull());
        $this->addColumn('{{%coupon}}', 'puntovendita_id', $this->integer());

        // creates index for column `profile_id`
        $this->createIndex(
            '{{%idx-coupon-profile_id}}',
            '{{%coupon}}',
            'profile_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-coupon-profile_id}}',
            '{{%coupon}}',
            'profile_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `puntovendita_id`
        $this->createIndex(
            '{{%idx-coupon-puntovendita_id}}',
            '{{%coupon}}',
            'puntovendita_id'
        );

        // add foreign key for table `{{%puntovendita}}`
        $this->addForeignKey(
            '{{%fk-coupon-puntovendita_id}}',
            '{{%coupon}}',
            'puntovendita_id',
            '{{%puntovendita}}',
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
            '{{%fk-coupon-profile_id}}',
            '{{%coupon}}'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            '{{%idx-coupon-profile_id}}',
            '{{%coupon}}'
        );

        // drops foreign key for table `{{%puntovendita}}`
        $this->dropForeignKey(
            '{{%fk-coupon-puntovendita_id}}',
            '{{%coupon}}'
        );

        // drops index for column `puntovendita_id`
        $this->dropIndex(
            '{{%idx-coupon-puntovendita_id}}',
            '{{%coupon}}'
        );

        $this->dropColumn('{{%coupon}}', 'profile_id');
        $this->dropColumn('{{%coupon}}', 'puntovendita_id');
    }
}
