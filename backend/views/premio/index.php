<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PremioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Premi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="premio-index">

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
            'valore',
            //'image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Premio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
