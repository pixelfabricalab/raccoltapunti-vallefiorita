<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Scontrino;
use common\models\ScontrinoData;
use common\models\ProdottiScontrinoData;


/* @var $this yii\web\View */
/* @var $searchModel common\models\ScontrinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Le mie scansioni';
?>
<div class="scontrino-index container">

    <p>
        <?= Html::a('Inserisci nuovo scontrino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nomefile',
            //'proprietario_id',
            //'datacattura',
            //'rfscontrino',
            //'piva',
            //'ragionesociale',
            //'dataemissione',
            //'numerodocumento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Scontrino $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>