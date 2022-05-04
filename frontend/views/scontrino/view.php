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
    <?php if ($datamodel[0]->piva == NULL) : ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomefile',
        ],
        'options' => [
            'class' => 'alert-warning',
        ],
    ]) ?>
    <?php else : ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomefile',
        ],
    ]) ?>
    <?php endif; ?>
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
    

        </tbody>
    </table>
    <hr />
    <h3>Prodotti Scontrino</h3>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <thead>
            <th>Nome prodotto</th>
            <th>Prezzo Prodotto</th>
            <th>Tipo Prodotto</th>
            <th>IVA Prodotto</th>
            <th>Multiprodotto</th>
            <th>Moltiplicatore</th>
            <th>Punti per prodotto</th>
            <th>Numero punti</th>
        </thead>
    </table>
    <hr />
    <h3>Output per OCR</h3>
        <textarea rows="10" cols="100"><?= $datamodel[0]->outputocr ?></textarea>
</div>