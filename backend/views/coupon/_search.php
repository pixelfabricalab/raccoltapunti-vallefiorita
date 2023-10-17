<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CouponSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="coupon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codice') ?>

    <?= $form->field($model, 'data_utilizzo') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'sconto_importo') ?>

    <?php // echo $form->field($model, 'sconto_percentuale') ?>

    <?php // echo $form->field($model, 'creato_il') ?>

    <?php // echo $form->field($model, 'modificato_il') ?>

    <?php // echo $form->field($model, 'profile_id') ?>

    <?php // echo $form->field($model, 'puntovendita_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
