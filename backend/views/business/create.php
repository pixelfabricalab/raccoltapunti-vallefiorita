<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Profilo $model */

$this->title = 'Nuova scheda azienda';
$this->params['breadcrumbs'][] = ['label' => 'Profili', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profilo-create">

    <?= $this->render('//profilo/_form', [
        'model' => $model,
    ]) ?>

</div>
