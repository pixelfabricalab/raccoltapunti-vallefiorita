<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profilo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profilo-form card shadow-sm">
    <div class="card-body">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

        <h6 class="text-info font-weight-bold">Anagrafica</h6>

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cellulare')->textInput() ?>

        <?= $form->field($model, 'data_nascita')->textInput(['type' => 'date']) ?>

        <?= $form->field($model, 'professione')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bio')->textarea() ?>

        <hr />

        <h6 class="text-info font-weight-bold">Residenza</h6>

        <?= $form->field($model, 'residenza_indirizzo') ?>

        <?= $form->field($model, 'residenza_citta') ?>

        <?= $form->field($model, 'residenza_cap') ?>

        <?= $form->field($model, 'residenza_provincia') ?>

        <div class="form-group">
            <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
