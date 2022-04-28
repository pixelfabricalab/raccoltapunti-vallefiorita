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

    <?php var_dump($datamodel); ?>
    <?php var_dump($dataprodottimodel); ?>
    <hr />

</div>