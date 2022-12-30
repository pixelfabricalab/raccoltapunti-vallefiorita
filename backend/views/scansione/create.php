<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScansioneTest */

$this->title = 'Create Scansione Test';
$this->params['breadcrumbs'][] = ['label' => 'Scansione Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scansione-test-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
