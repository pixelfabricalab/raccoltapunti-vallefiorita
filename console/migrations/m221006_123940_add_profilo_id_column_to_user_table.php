<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%profilo}}`
 */
class m221006_123940_add_profilo_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'profilo_id', $this->integer());

        // creates index for column `profilo_id`
        $this->createIndex(
            '{{%idx-user-profilo_id}}',
            '{{%user}}',
            'profilo_id'
        );

        // add foreign key for table `{{%profilo}}`
        $this->addForeignKey(
            '{{%fk-user-profilo_id}}',
            '{{%user}}',
            'profilo_id',
            '{{%profilo}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%profilo}}`
        $this->dropForeignKey(
            '{{%fk-user-profilo_id}}',
            '{{%user}}'
        );

        // drops index for column `profilo_id`
        $this->dropIndex(
            '{{%idx-user-profilo_id}}',
            '{{%user}}'
        );

        $this->dropColumn('{{%user}}', 'profilo_id');
    }
}
