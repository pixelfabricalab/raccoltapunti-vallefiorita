<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profilo $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;
?>

<div class="profilo-form row">
<div class="profilo-form col-xl-7">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_nascita')->textInput() ?>

    <?php if ($model->b2b) : ?>

    <hr class="my-4" />

    <h6 class="h6 mb-4 text-center">Dati aziendali</h6>

    <?= $form->field($model, 'b2b')->dropDownList([
        1 => 'Da validare',
        2 => 'Validato',
        -1 => 'Rifiuta',
    ])->label('Stato attività') ?>

    <?= $form->field($model, 'ragione_sociale') ?>

    <?= $form->field($model, 'partita_iva') ?>

    <?= $form->field($model, 'indirizzo') ?>

    <?= $form->field($model, 'comune') ?>

    <?= $form->field($model, 'cap')->label('CAP') ?>


    <?php endif; ?>

    <hr />

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
