<?php

use common\models\Profilo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\grid\TextFixedColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
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
            'user.username:email',
            'professione',
            'cellulare',
            // 'creato_il',
            // 'modificato_il',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
