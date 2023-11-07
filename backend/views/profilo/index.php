<?php

use common\models\Profilo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\grid\TextFixedColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
use yii\grid\DataColumn;
use common\widgets\grid\DateItColumn;

/** @var yii\web\View $this */
/** @var common\models\ProfiloSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profili';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Profilo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'cognome',
                'width' => 150,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'nome',
                'width' => 150,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'username',
                'value' => 'user.username',
                'width' => 340,
            ],
            [
                'attribute' => 'data_nascita',
                'class' => DateItColumn::class,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'professione',
                'width' => 130,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'cellulare',
                'width' => 100,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'residenza_cap',
                'width' => 70,
                'textAlign' => 'center',
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'residenza_citta',
                'width' => 200,
            ],
            [
                'class' => DataColumn::class,
            ],
            // 'creato_il',
            // 'modificato_il',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
