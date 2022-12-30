<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\ScansioneTest;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ScansioneTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scansione Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scansione-test-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_scontrino',
            'nome_scontrino',
            'dataora_scansione',
            'task',
            //'modo_scansione',
            //'engine_scansione',
            //'dpi_scansione',
            //'risoluzione',
            //'desk',
            //'has_valid_content',
            //'is_mail_sent',
            //'is_test',
            'piva',
            'datascontrino',
            //'ndoc',
            'lista_articoli:ntext',
            //'testo_rw:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ScansioneTest $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
