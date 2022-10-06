<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */

$this->title = 'Update Scontrino: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scontrinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scontrino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
