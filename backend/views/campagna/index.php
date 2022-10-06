<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CampagnaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campagne';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campagna-index">

    <p>
        <?= Html::a('Create Campagna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codice',
            'titolo',
            'descrizione:ntext',
            'inizio',
            //'fine',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Campagna $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
