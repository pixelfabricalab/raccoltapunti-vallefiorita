<?php

use common\models\Puntovendita;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\PuntovenditaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Punti vendita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntovendita-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ragione_sociale',
            'partita_iva',
            'codice_fiscale',
            'telefono',
            //'indirizzo',
            //'numero_civico',
            //'comune',
            //'cap',
            //'note:ntext',
            //'creato_il',
            //'modificato_il',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Puntovendita $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
