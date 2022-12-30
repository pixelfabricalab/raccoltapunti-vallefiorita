<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "scansione_test".
 *
 * @property int $id
 * @property int|null $id_scontrino
 * @property string|null $nome_scontrino
 * @property string|null $dataora_scansione
 * @property int|null $task
 * @property int|null $modo_scansione
 * @property int|null $engine_scansione
 * @property int|null $dpi_scansione
 * @property int|null $risoluzione
 * @property int|null $desk
 * @property int|null $has_valid_content
 * @property int|null $is_mail_sent
 * @property int|null $is_test
 * @property string|null $piva
 * @property string|null $datascontrino
 * @property string|null $ndoc
 * @property string|null $lista_articoli
 * @property string|null $testo_rw
 */
class ScansioneTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scansione_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scontrino', 'task', 'modo_scansione', 'engine_scansione', 'dpi_scansione', 'risoluzione', 'desk', 'has_valid_content', 'is_mail_sent', 'is_test'], 'integer'],
            [['dataora_scansione'], 'safe'],
            [['lista_articoli', 'testo_rw'], 'string'],
            [['nome_scontrino', 'piva', 'datascontrino', 'ndoc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_scontrino' => 'Id Scontrino',
            'nome_scontrino' => 'Nome Scontrino',
            'dataora_scansione' => 'Dataora Scansione',
            'task' => 'Task',
            'modo_scansione' => 'Modo Scansione',
            'engine_scansione' => 'Engine Scansione',
            'dpi_scansione' => 'Dpi Scansione',
            'risoluzione' => 'Risoluzione',
            'desk' => 'Desk',
            'has_valid_content' => 'Has Valid Content',
            'is_mail_sent' => 'Is Mail Sent',
            'is_test' => 'Is Test',
            'piva' => 'Piva',
            'datascontrino' => 'Datascontrino',
            'ndoc' => 'Ndoc',
            'lista_articoli' => 'Lista Articoli',
            'testo_rw' => 'Testo Rw',
        ];
    }

    public function getScontrino()
    {
        return $this->hasOne(\common\models\Scontrino::class, ['id' => 'id_scontrino']);
    }

}
