<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Puntovendita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puntovendita-form row">
    <div class="col-12 col-lg-6">
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <!--
    <?= $form->field($model, 'codice')->textInput(['maxlength' => true]) ?>
    -->

    <?= $form->field($model, 'ragione_sociale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'partita_iva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codice_fiscale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indirizzo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'insegna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
