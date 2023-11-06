<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Ciao <?= Html::encode($user->profilo->nome) ?>,<br />
    se non hai richiesto il reset della password puoi tranquillamente cestinare questa mail.</p>
    

    <p>Clicca sul pulsante qui in basso per resettare la tua password di Profility:</p>

    <p><?= Html::a('Reset password', $resetLink, ['class' => 'btn btn-primary']) ?></p>
</div>