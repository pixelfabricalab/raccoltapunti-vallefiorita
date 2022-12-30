<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ScansioneTestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scansione-test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_scontrino') ?>

    <?= $form->field($model, 'nome_scontrino') ?>

    <?= $form->field($model, 'dataora_scansione') ?>

    <?= $form->field($model, 'task') ?>

    <?php // echo $form->field($model, 'modo_scansione') ?>

    <?php // echo $form->field($model, 'engine_scansione') ?>

    <?php // echo $form->field($model, 'dpi_scansione') ?>

    <?php // echo $form->field($model, 'risoluzione') ?>

    <?php // echo $form->field($model, 'desk') ?>

    <?php // echo $form->field($model, 'has_valid_content') ?>

    <?php // echo $form->field($model, 'is_mail_sent') ?>

    <?php // echo $form->field($model, 'is_test') ?>

    <?php // echo $form->field($model, 'piva') ?>

    <?php // echo $form->field($model, 'datascontrino') ?>

    <?php // echo $form->field($model, 'ndoc') ?>

    <?php // echo $form->field($model, 'lista_articoli') ?>

    <?php // echo $form->field($model, 'testo_rw') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
