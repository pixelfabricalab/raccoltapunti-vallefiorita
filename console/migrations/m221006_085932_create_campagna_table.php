<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%campagna}}`.
 */
class m221006_085932_create_campagna_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%campagna}}', [
            'id' => $this->primaryKey(),
            'codice' => $this->string(),
            'titolo' => $this->string(),
            'descrizione' => $this->text(),
            'inizio' => $this->date(),
            'fine' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%campagna}}');
    }
}
