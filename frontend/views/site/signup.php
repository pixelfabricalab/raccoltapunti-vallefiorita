<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Registrati';
?>
<div class="site-signup container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Per registrarti e iniziare la raccolta punti compila i seguenti campi:</p>

    <div class="row">
        <div class="col">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class = "row">
                <div class="col-md-4">
                    <?= $form->field($model, 'nome')->textInput(['autofocus'=> true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'cognome') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'datanascita')->widget(DatePicker::classname(), [
                        'language' => 'it',
                        'dateFormat' => 'dd-MM-yyyy',
                        'class' => 'form-control',
                        'options' => array(
                            'class' => 'form-control'			// textField size
                        )
                        ])->label('Data di nascita') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'username')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'email')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <?= $form->field($model, 'trattamentodati')->radioList([
                    0 => 'Acconsento al trattamento dei dati', 
                    1 => 'Non acconsento al trattamento dei dati'
                ])->label('Trattamento dei dati generico'); ?>
                <?= $form->field($model, 'marketing')->radioList([
                    0 => 'Acconsento al trattamento dei dati ai fini marketing', 
                    1 => 'Non acconsento al trattamento dei dati ai fini marketing'
                ])->label('Trattamento dei dati ai fini marketing'); ?>
                <?= $form->field($model, 'profilazione')->radioList([
                    0 => 'Acconsento al trattamento dei dati a fine di profilazione', 
                    1 => 'Non acconsento al trattamento dei dati a fine di profilazione'
                ])->label('Trattamento dei dati per profilazione e statistica'); ?>
                </div>
            </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>