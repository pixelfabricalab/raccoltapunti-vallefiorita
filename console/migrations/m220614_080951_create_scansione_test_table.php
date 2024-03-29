<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scansione_test}}`.
 */
class m220614_080951_create_scansione_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%scansione_test}}', [
            'id' => $this->primaryKey(),
            'id_scontrino' => $this->integer(),
            'nome_scontrino' => $this->string(),
            'dataora_scansione' => $this->datetime(),
            'task' => $this->integer(),
            'modo_scansione' => $this->integer(),
            'engine_scansione' => $this->integer(),
            'dpi_scansione' => $this->integer(),
            'risoluzione' => $this->integer(),
            'desk' => $this->boolean(),
            'has_valid_content' => $this->boolean(),
            'is_mail_sent' => $this->boolean(),
            'is_test' => $this->boolean(),
            'piva' => $this->string(),
            'datascontrino' => $this->string(),
            'ndoc' => $this->string(),
            'lista_articoli' => $this->text(),
            'testo_rw' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%scansione_test}}');
    }
}
