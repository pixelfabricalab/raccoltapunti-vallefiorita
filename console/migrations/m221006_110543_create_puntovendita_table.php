<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%puntovendita}}`.
 */
class m221006_110543_create_puntovendita_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%puntovendita}}', [
            'id' => $this->primaryKey(),
            'codice' => $this->string(),
            'ragione_sociale' => $this->string(),
            'descrizione' => $this->text(),
            'partita_iva' => $this->string(),
            'codice_fiscale' => $this->string(),
            'indirizzo' => $this->string(),
            'cap' => $this->string(),
            'citta' => $this->string(),
            'insegna' => $this->string(),
            'creato_il' => $this->dateTime(),
            'modificato_il' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%puntovendita}}');
    }
}
