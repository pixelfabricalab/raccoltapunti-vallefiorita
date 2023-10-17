<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Puntovendita $model */

$this->title = 'Nuovo Punto vendita';
$this->params['breadcrumbs'][] = ['label' => 'Punti vendita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puntovendita-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
