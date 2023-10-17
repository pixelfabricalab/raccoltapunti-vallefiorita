<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'codice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_utilizzo')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'sconto_importo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sconto_percentuale')->textInput() ?>

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <?= $form->field($model, 'profile_id')->dropDownList($opts->getProfili()) ?>

    <?= $form->field($model, 'puntovendita_id')->dropDownList($opts->getPuntivendita(), ['prompt' => ' - Seleziona']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
