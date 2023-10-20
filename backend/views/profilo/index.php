<?php

use common\models\Profilo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
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
            ['class' => 'yii\grid\SerialColumn'],
            
            'nome',
            'cognome',
            'user.username:email',
            'data_nascita',
            //'cellulare',
            'creato_il',
            //'modificato_il',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Profilo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
