<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Profilo $model */

$this->title = 'Aggiorna scheda azienda';
$this->params['breadcrumbs'][] = ['label' => 'Profili', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profilo-update">

    <?= $this->render('//profilo/_form', [
        'model' => $model,
    ]) ?>

</div>
