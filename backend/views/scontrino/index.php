<?php

use common\models\Scontrino;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
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
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'profilo_id',
            'creato_il',
            'modificato_il',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Scontrino $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
