<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profilo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profilo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_nascita')->textInput() ?>

    <?= $form->field($model, 'professione')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eta')->textInput() ?>

    <?= $form->field($model, 'residenza_indirizzo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'residenza_citta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'residenza_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'residenza_provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
