<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scontrino}}`.
 */
class m220214_190438_create_scontrino_table extends Migration
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
            'dimensionefile' => $this->string(),
            'proprietario_id' => $this->integer(),
            'datacattura' => $this->string(),
            'rfscontrino' => $this->string(),
            'piva' => $this->string(),
            'ragionesociale' => $this->string(),
            'dataemissione' => $this->string(),
            'numerodocumento' => $this->string(),
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
