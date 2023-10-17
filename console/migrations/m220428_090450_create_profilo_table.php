<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profilo}}`.
 */
class m220428_090450_create_profilo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profilo}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(),
            'cognome' => $this->string(),
            'data_nascita' => $this->date(),
            'professione' => $this->string(),
            'eta' => $this->integer(),
            'residenza_indirizzo' => $this->string(),
            'residenza_citta' => $this->string(),
            'residenza_cap' => $this->string(),
            'residenza_provincia' => $this->string(),
            'cellulare' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profilo}}');
    }
}
