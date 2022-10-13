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
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
     integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
     crossorigin=""/>

 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>

<div class="puntovendita-index">

    <p>
        <?= Html::a('Nuovo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="mb-2">
        <div id="map"></div>
    </div>

<style>
    #map {height: 350px;}
</style>
<script>
var map = L.map('map').setView([40.3513835, 18.1766978], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([40.3513835, 18.1766978]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();

L.marker([40.3913835, 18.1966978]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.');
</script>    

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
