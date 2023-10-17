<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Puntovendita $model */

$this->title = 'Scheda: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Punti vendita', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="puntovendita-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
