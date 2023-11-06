<?php

use common\models\Profilo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\widgets\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\ProfiloSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profili';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'nome',
            'cognome',
            'user.username:email',
            'cellulare',
            'ragione_sociale',
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
            // 'partita_iva',
            'partita_iva',
            'indirizzo',
            'comune',
            'cap',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Profilo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
