<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */

$this->title = 'Update Coupon: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coupon-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
