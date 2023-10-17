<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProfiloSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profilo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'data_nascita') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'cellulare') ?>

    <?php // echo $form->field($model, 'creato_il') ?>

    <?php // echo $form->field($model, 'modificato_il') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
