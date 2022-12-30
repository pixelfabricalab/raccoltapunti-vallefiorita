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

    <?php
    $img = str_replace('/home/pixel/public_html', '', $model->scontrino->nomefile);
    ?>
    
    <div class="row">
    <div class="col-md-3">
    <a href="<?= $img ?>" target="_blank"><img src="<?= $img ?>" class="img-fluid" /></a>
    </div>
    <div class="col-md-9">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
    </div>
    

</div>
