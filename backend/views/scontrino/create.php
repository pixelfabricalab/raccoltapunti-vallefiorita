<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Scontrino $model */

$this->title = 'Create Scontrino';
$this->params['breadcrumbs'][] = ['label' => 'Scontrini', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scontrino-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
