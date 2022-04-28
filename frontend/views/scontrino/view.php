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
    <?= GridView::widget([
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
  
</div>