<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Ciao <?= Html::encode($user->profilo->nome) ?>,</p>

    <p>Clicca sul pulsante qui in basso per verificare la tua iscrizione a Profility:</p>

    <p><?= Html::a('Verifica account', $verifyLink, ['class' => 'btn btn-primary']) ?></p>
</div>
