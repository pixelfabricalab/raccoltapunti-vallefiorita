<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\GridView;

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
    <h3> Dettagli Scontrino</h3>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <thead>
            <th>RF Scontrino</th>
            <th>Numero Documento</th>
            <th>Data Emissione</th>
            <th>Ragione Sociale</th>
            <th>Indirizzo</th>
            <th>Provincia</th>
            <th>Città</th>
            <th>CAP</th>
            <th>Telefono</th>
            <th>P.IVA</th>
            <th>P.IVA Valida?</th>
            <th>P.IVA VIES?</th>
        </thead>
        <tbody>
            <tr><?= $datamodel[0]->rfscontrino; ?></tr>
            <tr><?= $datamodel[0]->numerodocumento; ?></tr>
            <tr><?= $datamodel[0]->dataemissione; ?></tr>
            <tr><?= $datamodel[0]->ragionesociale; ?></tr>
            <tr><?= $datamodel[0]->indirizzo; ?></tr>
            <tr><?= $datamodel[0]->provincia; ?></tr>
            <tr><?= $datamodel[0]->citta; ?></tr>
            <tr><?= $datamodel[0]->cap; ?></tr>
            <tr><?= $datamodel[0]->telefono; ?></tr>
            <tr><?= $datamodel[0]->piva; ?></tr>
            <tr><?= $datamodel[0]->pivaisvalid; ?></tr>
            <tr><?= $datamodel[0]->pivaisvies; ?></tr>

        </tbody>
    </table>
    <hr />
    <h3>Prodotti Scontrino</h3>
  
</div>