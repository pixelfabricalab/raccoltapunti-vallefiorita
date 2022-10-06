<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Campagna */

$this->title = 'Update Campagna: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Campagne', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="campagna-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
