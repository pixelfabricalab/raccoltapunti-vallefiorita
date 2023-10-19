<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_scadenza')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'data_utilizzo')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'sconto_importo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sconto_percentuale')->textInput() ?>

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <?= $form->field($model, 'profile_id')->textInput() ?>

    <?= $form->field($model, 'puntovendita_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
