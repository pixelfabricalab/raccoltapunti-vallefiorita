<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */

$this->title = "Dettaglio coupon";
$this->params['breadcrumbs'][] = ['label' => 'Coupon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coupon-view row">

    <?= $this->render('_single', ['model' => $model]) ?>

</div>
