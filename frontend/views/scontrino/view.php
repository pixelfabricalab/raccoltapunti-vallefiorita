<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */
/* @var $datamodel frontend\models\ScontrinoData */
/* @var $dataprodottimodel frontend\models\ProdottiScontrinoData */

$this->title = 'Scontrino n°'. $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="scontrino-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomefile',
        ],
    ]) ?>
    <hr />
    <?= DetailView::widget([
        'model' => $datamodel[0],
        'attributes' => [
            'rfscontrino' => 'Rfscontrino',
            'numerodocumento' => 'Numerodocumento',
            'dataemissione' => 'Dataemissione',
            'ragionesociale' => 'Ragionesociale',
            'indirizzo' => 'Indirizzo',
            'provincia' => 'Provincia',
            'citta' => 'Citta',
            'cap' => 'Cap',
            'telefono' => 'Telefono',
            'piva' => 'Piva',
            'pivaisvalid' => 'Pivaisvalid',
            'pivaisvies' => 'Pivaisvies',
            'dati_validi' => 'Dati Validi',
        ],
    ]) ?>
    <hr />
    <?= DetailView::widget([
        'model' => $dataprodottimodel[0],
        'attributes' => [
            'nomeprodotto' => 'Nomeprodotto',
            'prezzo_prodotto' => 'Prezzo Prodotto',
            'tipo_prodotto' => 'Tipo Prodotto',
            'iva_prodotto' => 'Iva Prodotto',
            'multiprodotto' => 'Multiprodotto',
            'conteggio_stesso_prodotto_per_riga' => 'Conteggio Stesso Prodotto Per Riga',
            'punti_per_prodotto' => 'Punti Per Prodotto',
            'numeropunti' => 'Numeropunti',
        ],
    ]) ?>
</div>