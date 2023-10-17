<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Puntovendita $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="puntovendita-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'ragione_sociale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'partita_iva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codice_fiscale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indirizzo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_civico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comune')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
