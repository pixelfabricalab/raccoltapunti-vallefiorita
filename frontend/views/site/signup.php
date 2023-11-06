<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
?>
<?php $this->title = "Registrati"?>
<div class="site-signup container">
    <h4 class="mb-4 text-center"><?= Html::encode($this->title) ?></h4>

    <?php if ($model->b2b) : ?>
    <p class="text-center">Hai un'attività? Valida i coupon dei tuoi clienti e ricevi bonus/premi</p>
    <?php else : ?>
    <p class="text-center">Registrati, iniziare invia gli scontrini e accumula punti</p>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card mb-2">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'layout' => 'horizontal', 'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
        ],
    ],]); ?>
                    <h6 class="h6 mb-4 text-center">Anagrafica</h6>

                    <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'cognome') ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?php if ($model->b2b) : ?>

                    <hr class="my-4" />

                    <h6 class="h6 mb-4 text-center">Dati aziendali</h6>

                    <?= $form->field($model, 'b2b')->hiddenInput()->label(false) ?>

                    <?= $form->field($model, 'ragione_sociale') ?>

                    <?= $form->field($model, 'partita_iva') ?>

                    <?= $form->field($model, 'indirizzo') ?>

                    <?= $form->field($model, 'comune') ?>

                    <?= $form->field($model, 'cap')->label('CAP') ?>

                    <?php endif; ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton('Registrati', ['class' => 'btn btn-success btn-block', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>
    </div>
</div>