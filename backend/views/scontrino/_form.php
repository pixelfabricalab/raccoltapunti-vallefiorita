<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Scontrino $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;
?>

<div class="scontrino-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'profilo_id')->dropDownList($opts->getProfili()) ?>

    <?php if (!$model->id) : ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'filename')->textInput() ?>
    
    <?= $form->field($model, 'sid')->textInput() ?>

    <?= $form->field($model, 'ragione_sociale')->textInput() ?>
    
    <?= $form->field($model, 'partita_iva')->textInput() ?>
    
    <?= $form->field($model, 'indirizzo')->textInput() ?>
    
    <?= $form->field($model, 'totale')->textInput(['type' => 'number']) ?>
    
    <?= $form->field($model, 'data_doc')->textInput() ?>
    
    <?= $form->field($model, 'ora_doc')->textInput() ?>

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
