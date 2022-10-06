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
    <div class="row">
        <div class="col-12 col-md-12 col-lg-8">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
