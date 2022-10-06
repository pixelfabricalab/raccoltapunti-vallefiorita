<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Profilo;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfiloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profili';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profilo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'cognome',
            'data_nascita',
            'professione',
            //'eta',
            //'residenza_indirizzo',
            //'residenza_citta',
            //'residenza_cap',
            //'residenza_provincia',
            //'cellulare',
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
