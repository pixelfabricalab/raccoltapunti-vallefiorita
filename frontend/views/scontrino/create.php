<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */

$this->title = 'Create Scontrino';
$this->params['breadcrumbs'][] = ['label' => 'Scontrini', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scontrino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>