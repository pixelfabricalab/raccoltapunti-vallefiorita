<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scontrino}}`.
 */
class m220428_090459_create_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%scontrino}}', [
            'id' => $this->primaryKey(),
            'nomefile' => $this->string(),
            'hashnomefile' => $this->string(),
            'estensionefile' => $this->string(),
            'data_caricamento' => $this->string(),
            'mimetype' => $this->string(),
            'tmpfilename' => $this->string(),
            'proprietario_id' => $this->integer(),
            'dimensione' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%scontrino}}');
    }
}
