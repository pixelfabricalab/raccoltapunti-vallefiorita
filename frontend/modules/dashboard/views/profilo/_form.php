<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profilo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profilo-form card">
    <div class="card-body">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

        <h6 class="text-info font-weight-bold">Anagrafica</h6>

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'data_nascita')->textInput() ?>

        <?= $form->field($model, 'professione')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'eta')->textInput() ?>

        <hr />

        <h6 class="text-info font-weight-bold">Residenza</h6>

        <?= $form->field($model, 'residenza_indirizzo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'residenza_citta')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'residenza_cap')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'residenza_provincia')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
