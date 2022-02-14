<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ScontrinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scontrinos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scontrino-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Scontrino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomefile',
            'hashnomefile',
            'estensionefile',
            'dimensionefile',
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
