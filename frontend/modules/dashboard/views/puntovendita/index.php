<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PuntovenditaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Puntovenditas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntovendita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Puntovendita', ['create'], ['class' => 'btn btn-success']) ?>
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
            'ragione_sociale',
            'descrizione:ntext',
            'partita_iva',
            //'codice_fiscale',
            //'indirizzo',
            //'cap',
            //'citta',
            //'insegna',
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
