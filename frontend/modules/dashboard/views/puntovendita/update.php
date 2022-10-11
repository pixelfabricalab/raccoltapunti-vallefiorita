<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Puntovendita */

$this->title = 'Update Puntovendita: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Punti vendita', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="puntovendita-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
