<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PuntovenditaSearch $model */
/** @var yii\widgets\ActiveForm $form */
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

    <?= $form->field($model, 'ragione_sociale') ?>

    <?= $form->field($model, 'partita_iva') ?>

    <?= $form->field($model, 'codice_fiscale') ?>

    <?= $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'indirizzo') ?>

    <?php // echo $form->field($model, 'numero_civico') ?>

    <?php // echo $form->field($model, 'comune') ?>

    <?php // echo $form->field($model, 'cap') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'creato_il') ?>

    <?php // echo $form->field($model, 'modificato_il') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
