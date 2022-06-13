<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scontrino-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomefile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hashnomefile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estensionefile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dimensionefile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proprietario_id')->textInput() ?>

    <?= $form->field($model, 'datacattura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfscontrino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ragionesociale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataemissione')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numerodocumento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
