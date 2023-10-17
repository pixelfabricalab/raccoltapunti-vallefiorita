<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coupon}}`.
 */
class m231012_110802_create_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coupon}}', [
            'id' => $this->primaryKey(),
            'codice' => $this->string(),
            'data_utilizzo' => $this->dateTime(),
            'status' => $this->boolean(),
            'sconto_importo' => $this->decimal(7,2),
            'sconto_percentuale' => $this->integer(),
            'creato_il' => $this->dateTime(),
            'modificato_il' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coupon}}');
    }
}
