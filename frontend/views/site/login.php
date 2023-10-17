<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Accedi / Registrati';
?>
<div class="site-login container">
    <h2 class="mt-2"><?= Html::encode($this->title) ?></h2>

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
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <hr />

                        <div style="color:#999;margin:1em 0"><small>
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
                    <p>Per iniziare la raccolta punti devi registrarti. Potrai usufruire di numerosi vantaggi e premi.</p>
                    <?= Html::a('Registrati', ['site/signup'], [ 'class' => 'btn btn-block btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
