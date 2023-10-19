<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ScontrinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scontrini';
?>
<div class="scontrino-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_single',
        'options' => ['class' => 'row d-flex justify-content-left align-items-left h-100'],
        'itemOptions' => ['tag' => false],
    ]); ?>

</div>
