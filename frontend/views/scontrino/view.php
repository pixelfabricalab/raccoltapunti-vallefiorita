<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Scontrino */
/* @var $datamodel app\models\ScontrinoData */
/* @var $dataprodottimodel app\models\ProdottiScontrinoData */

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
        'datamodel' => $datamodel,
        'attributes' => [
            'nomefile',
        ],
    ]) ?>
    <hr />
    <?= DetailView::widget([
        'dataprodottimodel' => $dataprodottimodel,
        'attributes' => [
            'nomefile',
        ],
    ]) ?>
</div>