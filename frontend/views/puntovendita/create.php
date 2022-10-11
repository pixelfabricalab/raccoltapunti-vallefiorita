<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Puntovendita */

$this->title = 'Create Puntovendita';
$this->params['breadcrumbs'][] = ['label' => 'Puntovenditas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntovendita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
