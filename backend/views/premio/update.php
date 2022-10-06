<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Premio */

$this->title = 'Update Premio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Premi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="premio-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
