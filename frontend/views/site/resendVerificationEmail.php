<?php

/** @var yii\web\View$this  */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Email di verifica';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email container">
    <h4 class="mb-4 text-center"><?= Html::encode($this->title) ?></h4>

    <div class="row justify-content-center">
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-body">

                    <p>Inserisci la tua email per ricevere nuovamente l'email di verifica:</p>

                    <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Invia', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
