<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProfiloSearch */
/* @var $form yii\widgets\ActiveForm */
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

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'data_nascita') ?>

    <?= $form->field($model, 'professione') ?>

    <?php // echo $form->field($model, 'eta') ?>

    <?php // echo $form->field($model, 'residenza_indirizzo') ?>

    <?php // echo $form->field($model, 'residenza_citta') ?>

    <?php // echo $form->field($model, 'residenza_cap') ?>

    <?php // echo $form->field($model, 'residenza_provincia') ?>

    <?php // echo $form->field($model, 'cellulare') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
