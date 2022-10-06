<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%premio}}`.
 */
class m221006_084916_create_premio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%premio}}', [
            'id' => $this->primaryKey(),
            'codice' => $this->string(),
            'titolo' => $this->string(),
            'descrizione' => $this->text(),
            'valore' => $this->integer(),
            'image' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%premio}}');
    }
}
