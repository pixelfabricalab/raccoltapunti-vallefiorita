<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PuntovenditaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puntovendita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codice') ?>

    <?= $form->field($model, 'ragione_sociale') ?>

    <?= $form->field($model, 'descrizione') ?>

    <?= $form->field($model, 'partita_iva') ?>

    <?php // echo $form->field($model, 'codice_fiscale') ?>

    <?php // echo $form->field($model, 'indirizzo') ?>

    <?php // echo $form->field($model, 'cap') ?>

    <?php // echo $form->field($model, 'citta') ?>

    <?php // echo $form->field($model, 'insegna') ?>

    <?php // echo $form->field($model, 'creato_il') ?>

    <?php // echo $form->field($model, 'modificato_il') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
