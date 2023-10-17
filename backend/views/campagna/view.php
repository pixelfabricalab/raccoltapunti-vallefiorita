<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Campagna */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Campagne', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="campagna-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'codice',
            'titolo',
            'descrizione:ntext',
            'inizio',
            'fine',
        ],
    ]) ?>

</div>
