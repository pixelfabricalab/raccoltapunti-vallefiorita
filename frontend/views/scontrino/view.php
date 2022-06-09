<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */

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
        'options' => [
            'class' => 'alert-warning',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomefile',
        ],
    ]) ?>
</div>