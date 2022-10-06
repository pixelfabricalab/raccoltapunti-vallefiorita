<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profilo */

$this->title = 'Aggiorna Profilo';
$this->params['breadcrumbs'][] = ['label' => 'Profili', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profilo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
