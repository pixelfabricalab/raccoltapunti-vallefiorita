<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%scontrino}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%profilo}}`
 */
class m231106_160314_add_esercente_id_column_to_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%scontrino}}', 'esercente_id', $this->integer());

        // creates index for column `esercente_id`
        $this->createIndex(
            '{{%idx-scontrino-esercente_id}}',
            '{{%scontrino}}',
            'esercente_id'
        );

        // add foreign key for table `{{%profilo}}`
        $this->addForeignKey(
            '{{%fk-scontrino-esercente_id}}',
            '{{%scontrino}}',
            'esercente_id',
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
            '{{%fk-scontrino-esercente_id}}',
            '{{%scontrino}}'
        );

        // drops index for column `esercente_id`
        $this->dropIndex(
            '{{%idx-scontrino-esercente_id}}',
            '{{%scontrino}}'
        );

        $this->dropColumn('{{%scontrino}}', 'esercente_id');
    }
}
