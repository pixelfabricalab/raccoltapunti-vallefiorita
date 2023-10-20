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
        <?= $this->render('_single', ['model' => $model]) ?>
    </div> 
</div>