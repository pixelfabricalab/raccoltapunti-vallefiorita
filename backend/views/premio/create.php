<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Premio */

$this->title = 'Create Premio';
$this->params['breadcrumbs'][] = ['label' => 'Premi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="premio-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
