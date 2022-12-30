<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ScansioneTest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scansione-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'piva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datascontrino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ndoc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lista_articoli')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'testo_rw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_scontrino')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'nome_scontrino')->textInput(['readonly' => true, 'maxlength' => true]) ?>

    <?= $form->field($model, 'dataora_scansione')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'task')->textInput() ?>

    <div class="row">
        <div class="col-md-3">
    <?= $form->field($model, 'modo_scansione')->textInput(['readonly' => true]) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'engine_scansione')->textInput(['readonly' => true]) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'dpi_scansione')->textInput(['readonly' => true]) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'risoluzione')->textInput(['readonly' => true]) ?>
        </div>
    </div>





    <?= $form->field($model, 'desk')->textInput() ?>

    <?= $form->field($model, 'has_valid_content')->textInput() ?>

    <?= $form->field($model, 'is_mail_sent')->textInput() ?>

    <?= $form->field($model, 'is_test')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
