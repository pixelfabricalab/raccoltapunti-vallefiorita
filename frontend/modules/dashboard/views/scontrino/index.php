<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use common\models\Scontrino;
use common\models\ScontrinoData;
use common\models\ProdottiScontrinoData;


/* @var $this yii\web\View */
/* @var $searchModel common\models\ScontrinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scontrini';
?>
<div class="scontrino-index table-responsive">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ragione_sociale',
            'partita_iva',
            //'proprietario_id',
            //'datacattura',
            //'rfscontrino',
            //'piva',
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
