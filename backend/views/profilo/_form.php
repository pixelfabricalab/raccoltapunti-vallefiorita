<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profilo $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;
?>

<div class="profilo-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'user_id')->dropDownList($opts->getUsers()) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_nascita')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creato_il')->textInput() ?>

    <?= $form->field($model, 'modificato_il')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
