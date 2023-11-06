<?php

use common\models\Coupon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use common\widgets\grid\TextFixedColumn;
use common\widgets\grid\EuroColumn;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\CouponSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Coupon';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Coupon $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            'codice',
            [
                'attribute' => 'sconto_importo',
                'class' => EuroColumn::class,
                'label' => 'Importo',
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'sconto_percentuale',
                'label' => '%',
                'width' => 90,
                'textAlign' => 'center',
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'status',
                'content' => function ($model) {
                    $content = '';
                    if ($model->status == Coupon::STATUS_ATTIVO) {
                        $content = '<small class="badge rounded-pill text-bg-success">Attivo</small>';
                    } 
                    if ($model->status == Coupon::STATUS_DISATTIVO) {
                        $content = '<small class="badge rounded-pill text-bg-info text-white">Da Convalidare</small>';
                    } 
                    if ($model->status == Coupon::STATUS_RITIRATO) {
                        $content = '<small class="badge rounded-pill text-bg-danger text-white">Ritirato</small>';
                    }
                    return $content;
                },
                'format' => 'raw',
                'width' => 90,
                'textAlign' => 'center',
            ],
            [
                'attribute' => 'data_utilizzo',
                'class' => 'common\widgets\grid\DateItColumn',
            ],
            [
                'attribute' => 'creato_il',
                'class' => 'common\widgets\grid\DateItColumn',
            ],
            //'modificato_il',
            //'profile_id',
            //'puntovendita_id',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
