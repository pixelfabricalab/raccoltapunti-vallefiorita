<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Puntovendita */

$this->title = 'Nuovo';
$this->params['breadcrumbs'][] = ['label' => 'Punti vendita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntovendita-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
