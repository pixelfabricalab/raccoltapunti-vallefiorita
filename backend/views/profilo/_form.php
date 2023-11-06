<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profilo $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;

$this->registerJs(
    "$('#profilo-b2b').on('change', function() { const val = $(this).val(); if (val == '0' || val == '') { $('#b2b').hide(); } else { $('#b2b').show(); } }).trigger('change');",
    $this::POS_READY,
    'b2b-handler'
);

?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'applyOffset' => true,]); ?>
<div class="profilo-form row">
    <div class="col-md-8 col-xl-5">
        <div class="card shadow-sm">
            <div class="card-body">

                <h6 class="h6 mb-4 text-center">Informazioni personali</h6>

                <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'b2b')->dropDownList([
                    $model::B2B_NO => 'No',
                    $model::B2B_SI => 'Da validare',
                    $model::B2B_ATTIVO => 'Verificato',
                    $model::B2B_RIFIUTATO => 'Rifiutato',
                ])->label('Profilo B2B') ?>

                <?= $form->field($model, 'data_nascita')->textInput(['type' => 'date']) ?>
                
                <?= $form->field($model, 'professione')->textInput(['maxlength' => true]) ?>

                <hr class="my-4" />

                <h6 class="h6 mb-4 text-center">Residenza</h6>

                <?= $form->field($model, 'residenza_indirizzo')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'residenza_citta')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'residenza_cap')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'residenza_provincia')->textInput(['maxlength' => true]) ?>
                
                <div id="b2b">

                    <hr class="my-4" />

                    <h6 class="h6 mb-4 text-center">Dati aziendali</h6>

                    <?= $form->field($model, 'ragione_sociale') ?>

                    <?= $form->field($model, 'partita_iva') ?>

                    <?= $form->field($model, 'indirizzo') ?>

                    <?= $form->field($model, 'comune') ?>

                    <?= $form->field($model, 'cap')->label('CAP') ?>

                    <?= $form->field($model, 'tipo_sconto')->dropDownList($opts->getTipiSconto()) ?>

                    <?= $form->field($model, 'valore_sconto')->textInput(['type' => 'number', 'min' => 0]) ?>

                </div>

            </div>
            <div class="card-footer text-end">

                    <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>

            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

