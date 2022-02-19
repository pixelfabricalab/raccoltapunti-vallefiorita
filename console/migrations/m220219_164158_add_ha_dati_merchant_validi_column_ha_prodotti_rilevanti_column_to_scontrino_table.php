<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%scontrino}}`.
 */
class m220219_164158_add_ha_dati_merchant_validi_column_ha_prodotti_rilevanti_column_to_scontrino_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%scontrino}}', 'ha_dati_merchant_validi', $this->boolean());
        $this->addColumn('{{%scontrino}}', 'ha_prodotti_rilevanti', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%scontrino}}', 'ha_dati_merchant_validi');
        $this->dropColumn('{{%scontrino}}', 'ha_prodotti_rilevanti');
    }
}
