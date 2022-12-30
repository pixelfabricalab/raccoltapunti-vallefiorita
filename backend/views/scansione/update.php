<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScansioneTest */

$this->title = 'Scheda scansione: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scansione Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scansione-test-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
