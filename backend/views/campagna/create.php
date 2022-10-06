<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Campagna */

$this->title = 'Create Campagna';
$this->params['breadcrumbs'][] = ['label' => 'Campagne', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campagna-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
