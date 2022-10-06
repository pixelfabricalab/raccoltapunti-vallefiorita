<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ScontrinoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scontrino-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomefile') ?>

    <?= $form->field($model, 'hashnomefile') ?>

    <?= $form->field($model, 'estensionefile') ?>

    <?= $form->field($model, 'dimensionefile') ?>

    <?php // echo $form->field($model, 'proprietario_id') ?>

    <?php // echo $form->field($model, 'datacattura') ?>

    <?php // echo $form->field($model, 'rfscontrino') ?>

    <?php // echo $form->field($model, 'piva') ?>

    <?php // echo $form->field($model, 'ragionesociale') ?>

    <?php // echo $form->field($model, 'dataemissione') ?>

    <?php // echo $form->field($model, 'numerodocumento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
