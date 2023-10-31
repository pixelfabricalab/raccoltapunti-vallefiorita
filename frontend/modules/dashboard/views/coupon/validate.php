<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */

$this->title = "Ritira coupon";
$this->params['breadcrumbs'][] = ['label' => 'Coupon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



<div class="coupon-validate row">
    
    <?php if ($model->id) : ?>
    <?= $this->render('_single', ['model' => $model]) ?>
    <?php else :?>
    <div class="col">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php endif; ?>

</div>

    <?php if ($model->status) : ?>
    <?= Html::a("Ritira", ['validate', 'codice' => $model->codice, 'confirm' => 1], ['class' => 'btn btn-lg btn-success btn-block']) ?>
    <?php endif; ?>
