<?php

use common\models\Scontrino;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use common\widgets\grid\TextFixedColumn;
use common\widgets\grid\EuroColumn;
use common\widgets\grid\DateItColumn;
use yii\widgets\Pjax;
use yii\grid\DataColumn;
/** @var yii\web\View $this */
/** @var common\models\ScontrinoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Scontrini';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scontrino-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Scontrino $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'partita_iva',
                'width' => 100,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'ragione_sociale',
                'width' => 390,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'indirizzo',
                'width' => 390,
            ],
            [
                'class' => TextFixedColumn::class,
                'label' => 'Caricato da',
                'width' => 150,
                'content' => function ($model) {
                    if ($model->profilo) {
                        return $model->profilo->cognomeNome;
                    }
                    return '';
                },
            ],
            [
                'attribute' => 'data_doc',
                'class' => DateItColumn::class,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'ora_doc',
                'label' => 'Ora',
                'width' => 40,
                'textAlign' => 'center',
            ],
            [
                'attribute' => 'totale',
                'class' => EuroColumn::class,
            ],
            [
                'class' => DataColumn::class,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
