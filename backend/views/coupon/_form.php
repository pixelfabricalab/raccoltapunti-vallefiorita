<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;
?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'applyOffset' => true]); ?>

<div class="coupon-form row">
    <div class="col-md-8 col-xl-6">
        <div class="card shadow-sm">
            <div class="card-body">

                <?= $form->field($model, 'codice')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'profile_id')->dropDownList($opts->getProfili(true))->label('Proprietario') ?>

                <?= $form->field($model, 'creato_il')->textInput(['type' => 'date'])->label('Data emissione') ?>

                <?= $form->field($model, 'sconto_importo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sconto_percentuale')->textInput() ?>

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
