<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profilo */

$this->title = 'Create Profilo';
$this->params['breadcrumbs'][] = ['label' => 'Profili', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
