<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */
/* @var $datamodel common\models\ScontrinoData */
/* @var $dataprodottimodel common\models\ProdottiScontrinoData */

$this->title = 'Dettagli Scontrino';
\yii\web\YiiAsset::register($this);
?>
<a href="<?= Url::to('index') ?>">&#0171; Torna alla lista</a>

<div class="scontrino-view">
    <div class="row">
        <?= $this->render('_single', ['model' => $model, 'full' => true]) ?>
    </div> 
</div>