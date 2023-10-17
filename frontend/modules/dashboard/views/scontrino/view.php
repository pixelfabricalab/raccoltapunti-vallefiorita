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
<div class="scontrino-view">
    <div class="row">
        <div class="col col-md-9">
            <h6 class="esercente title">Dati immagine scansionata</h6>
            Ragione Sociale: <?= $model->ragione_sociale ?><br>
            P.IVA: <?= $model->partita_iva ?><br>
            <h6>Articoli</h6>
            <ul>
            <?php foreach ($model->getItems() as $item) : ?>
            <li><?= $item['description'] ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="col col-md-3">

        </div>
    </div>
</div>