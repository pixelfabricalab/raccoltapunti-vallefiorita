<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Accedi / Registrati';
?>
<div class="site-login container">
    <h4 class="mb-4 text-center"><?= Html::encode($this->title) ?></h4>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Accedi</h5>
                </div>
                <div class="card-body">
                    <p>Accedi utilizzando nome utente e password:</p>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox()->label('Ricordami') ?>

                        <div class="form-group">
                            <?= Html::submitButton('Accedi', ['class' => 'btn btn-primary btn-sm', 'name' => 'login-button']) ?>
                        </div>

                        <hr />

                        <div style="color:#999;" class="mt-2"><small>
                            Hai dimenticato la password? Puoi eseguire un <?= Html::a('reset', ['site/request-password-reset']) ?>.
                            <br>
                            Non hai ricevuto la mail di verifica? <?= Html::a('Reivia mail', ['site/resend-verification-email']) ?></small>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Registrati</h5>
                </div>
                <div class="card-body">
                    <p>Registrati, scansiona scontrini e ricevi coupon da spendere in numerose attività convenzionate.</p>
                    <?= Html::a('Registrati', ['site/signup'], [ 'class' => 'btn btn-success btn-sm']) ?>
                    <hr />
                    <h6>Hai un'attività?</h6>
                    <p>Se desideri registrarti come attività convenzionata nel circuito, per usufruire di bonus e vantaggi:</p>
                    <?= Html::a('Registrati come attività', ['site/signup', 'b2b' => 1], [ 'class' => 'btn btn-success btn-sm']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
