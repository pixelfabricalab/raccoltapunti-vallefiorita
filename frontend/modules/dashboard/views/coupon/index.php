<?php

use common\models\Coupon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;

/** @var yii\web\View $this */
/** @var common\models\CouponSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Coupon';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codice',
            'data_utilizzo',
            'status',
            'sconto_importo',
            //'sconto_percentuale',
            //'creato_il',
            //'modificato_il',
            //'profile_id',
            //'puntovendita_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Coupon $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
