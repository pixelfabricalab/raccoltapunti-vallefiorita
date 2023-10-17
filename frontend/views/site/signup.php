<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
?>
<?php $this->title = "Registrati"?>
<div class="site-signup container">
    <h2 class="mt-2"><?= Html::encode($this->title) ?></h2>

    <p>Compila i seguenti campi per registrarti, iniziare ad eseguire delle scansioni ed accumulare punti:</p>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5>Registrati</h5>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'layout' => 'horizontal']); ?>

                    <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'cognome') ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton('Registrati', ['class' => 'btn btn-success btn-block', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>
    </div>
</div>