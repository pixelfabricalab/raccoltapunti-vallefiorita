<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PuntovenditaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Punti vendita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntovendita-index">

    <p>
        <?= Html::a('Nuovo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'codice',
            'ragione_sociale',
            'descrizione:ntext',
            'partita_iva',
            //'codice_fiscale',
            'indirizzo',
            //'cap',
            'citta',
            'insegna',
            'creato_il',
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
