<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">

    <p>Benvenuto/a <?= Html::encode($user->username) ?></p>
    <p>verifica il tuo account cliccando il link di seguito:</p>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="left">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td> <?= Html::a('VERIFICA EMAIL', $verifyLink) ?></td>
                </tr>
                </tbody>
            </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
