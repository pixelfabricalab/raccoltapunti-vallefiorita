<?php

use common\models\Coupon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var common\models\CouponSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Coupon';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_single',
        'options' => ['class' => 'row d-flex justify-content-left align-items-left h-100'],
        'itemOptions' => ['tag' => false],
    ]); ?>


</div>
