<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CouponSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="coupon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['validate'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codice') ?>

    <?php // echo $form->field($model, 'data_utilizzo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'sconto_importo') ?>

    <?php // echo $form->field($model, 'sconto_percentuale') ?>

    <?php // echo $form->field($model, 'creato_il') ?>

    <?php // echo $form->field($model, 'modificato_il') ?>

    <?php // echo $form->field($model, 'profile_id') ?>

    <?php // echo $form->field($model, 'puntovendita_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Cerca', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
