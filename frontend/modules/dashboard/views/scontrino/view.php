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
    <h2>Questo scontrino vale <?=rand(0,10)?> punti!</h2>
</div>
<hr />
<h1>Dettaglio scontrino</h1>
<div class="scontrino-view container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <img src="<?= "/frontend/web/uploads/scontrini/". $model->hashnomefile . "." . $model->estensionefile ?>" width="300">
        </div>
        <div class="col-md-9 col-sm-12">
    <h3 class="esercente title">Dati immagine scansionata</h3>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                ['label' => 'File',
                 'attribute' => function($model) {
                    return $model->hashnomefile . "." . $model->estensionefile;
                 }   
                ],
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
    </div>
</div>