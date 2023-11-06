<?php

use common\models\Coupon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\CouponSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Coupons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codice',
            'data_utilizzo',
            'sconto_importo',
            'sconto_percentuale',
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    $content = '';
                    if ($model->status) {
                        $content = '<small class="badge rounded-pill text-bg-success">Attivo</small>';
                    } else {
                        $content = '<small class="badge rounded-pill text-bg-danger">Ritirato</small>';
                    }
                    return $content;
                },
                'format' => 'raw',
            ],
            'data_utilizzo',
            'creato_il',
            //'modificato_il',
            //'profile_id',
            //'puntovendita_id',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Coupon $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
