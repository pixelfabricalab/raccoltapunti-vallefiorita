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
            'partita_iva' => $this->string(),
            'descrizione' => $this->text(),
            'codice_fiscale' => $this->string(),
            'telefono' => $this->string(),
            'indirizzo' => $this->string(),
            'numero_civico' => $this->string(),
            'comune' => $this->string(),
            'cap' => $this->string(),
            'citta' => $this->string(),
            'insegna' => $this->string(),
            'note' => $this->text(),
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
