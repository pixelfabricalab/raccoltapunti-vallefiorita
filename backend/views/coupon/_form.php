<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;

$this->registerJs(
    "$('#coupon-tipo_sconto').on('change', function() { 
        const val = $(this).val(); if (val == 'percentuale') {
            $('#coupon-sconto_importo').val(0); 
            $('#sconto-importo-field').hide();
            $('#sconto-percentuale-field').show(); 
        } else { 
            $('#coupon-sconto_percentuale').val(0); 
            $('#sconto-percentuale-field').hide(); 
            $('#sconto-importo-field').show();
        }
    }).trigger('change');",
    $this::POS_READY,
    'tipo_sconto-handler'
);

?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'applyOffset' => true]); ?>

<div class="coupon-form row">
    <div class="col-md-8 col-xl-6">
        <div class="card shadow-sm">
            <div class="card-body">

                <?= $form->field($model, 'codice')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'profile_id')->dropDownList($opts->getProfili(true))->label('Proprietario') ?>

                <?= $form->field($model, 'creato_il')->textInput(['type' => 'date'])->label('Data emissione') ?>

                <?= $form->field($model, 'tipo_sconto')->dropDownList($opts->getTipiSconto()) ?>

                <div id="sconto-importo-field">
                <?= $form->field($model, 'sconto_importo')->textInput(['type' => 'number', 'min' => 0]) ?>
                </div>

                <div id="sconto-percentuale-field">
                <?= $form->field($model, 'sconto_percentuale')->textInput(['type' => 'number', 'min' => 0, 'max' => 100]) ?>
                </div>

                <?= $form->field($model, 'data_scadenza')->textInput(['type' => 'date']) ?>

                <hr />

                <?= $form->field($model, 'status')->dropDownList([
                    '1' => 'Attivo',
                    '0' => 'Ritirato',
                ]) ?>

                <?= $form->field($model, 'data_utilizzo')->textInput(['type' => 'datetime-local'])->label('Data ritiro') ?>

                <?= $form->field($model, 'esercente_id')->dropDownList($opts->getEsercenti())->label('Ritirato da') ?>

            </div>
            <div class="card-footer text-end">
                <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
