<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */
/* @var $uploadmodel frontend\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scontrino-form">
<div class="alert alert-warning"><p><strong>Attenzione!</strong><br />La piattaforma è in modalità di test. Le scansioni partono ogni 4 ore circa. Il numero consigliato di scontrini da caricare è 3-4.<br /><br />Numero scontrini in attesa di essere scansionati: <?= $numero_scontrini ?></p></div>
<?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']] // important
); ?>

    <?= $form->field($model, 'nomefile')->fileInput(['class' => 'form-control-file fileinput'])->label('Carica Scontrino') ?>
    <div>
        <?= Html::submitButton('Carica', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
