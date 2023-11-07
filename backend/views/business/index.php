<?php

use common\models\Profilo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use common\widgets\grid\TextFixedColumn;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\ProfiloSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Aziende';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Profilo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            'ragione_sociale',
            'partita_iva',
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'cognome',
                'width' => 150,
            ],
            [
                'class' => TextFixedColumn::class,
                'attribute' => 'nome',
                'width' => 150,
            ],
            [
                'label' => 'Email',
                'attribute' => 'user.username',
            ],
            'cellulare',
            [
                'attribute' => 'b2b',
                'content' => function ($model) {
                    $content = '';
                    if ($model->b2b == Profilo::B2B_SI) {
                        $content = '<small class="badge rounded-pill text-bg-warning">Da verificare</small>';
                    }
                    if ($model->b2b == Profilo::B2B_ATTIVO) {
                        $content = '<small class="badge rounded-pill text-bg-success">Verificato</small>';
                    }
                    if ($model->b2b == Profilo::B2B_RIFIUTATO) {
                        $content = '<small class="badge rounded-pill text-bg-danger">Rifiutato</small>';
                    }
                    return $content;
                },
                'format' => 'raw',
            ],
            // 'creato_il',
            'indirizzo',
            'comune',
            'cap',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
