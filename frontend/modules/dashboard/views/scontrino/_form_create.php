<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */
/* @var $uploadmodel frontend\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scontrino-form">
<?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']] // important
); ?>

    <?= $form->field($model, 'nomefile')->fileInput(['class' => 'form-control-file fileinput', 'accept' => 'image/*;capture=camera', 'capture' => true])->label(false) ?>
    <div>
        <?= Html::submitButton('Carica', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
