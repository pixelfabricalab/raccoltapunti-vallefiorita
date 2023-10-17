<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Profilo $model */

$this->title = 'Create Profilo';
$this->params['breadcrumbs'][] = ['label' => 'Profili', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
