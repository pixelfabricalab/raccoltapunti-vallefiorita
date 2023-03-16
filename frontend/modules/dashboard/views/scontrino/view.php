<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */
/* @var $datamodel common\models\ScontrinoData */
/* @var $dataprodottimodel common\models\ProdottiScontrinoData */

$this->title = 'Scontrino id n°'. $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="alert alert-success">
    <h1>Questo scontrino vale <?=rand(0,10)?> punti!</h1>
</div>
<hr />
<h1>Dettaglio scontrino</h1>
<div class="scontrino-view container">
<h3 class="esercente title">Dati immagine scansionata</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomefile',
            'data_caricamento',
        ],
    ]) ?>
    <h3 class="esercente title">Dati esercente</h3>
    <?= DetailView::widget([
        'model' => $datamodel,
        'attributes' => [
            'rfscontrino',
            'numerodocumento',
            'dataemissione',
            'ragionesociale',
            'indirizzo',
            'provincia',
            'citta',
            'cap',
            'telefono',
            'partitaiva',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $provider_dataprodotti,
		'emptyText' => 'Non esistono prodotti sullo scontrino.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [ 
                'header' => 'Nome prodotto',
                'attribute' => 'nomeprodotto',
            ],
            [
                'header' => 'Prezzo Prodotto',
                'attribute' => 'prezzo_prodotto',
            ],
            [
                'header' => 'Numero punti',
                'attribute' => 'numeropunti',
            ],
        ]]);
        ?>
</div>