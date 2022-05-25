<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */
/* @var $uploadmodel frontend\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scontrino-form">

<?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']] // important
); ?>

    <?= $form->field($model, 'nomefile')->fileInput(['class' => 'form-control-file fileinput'])->label('Carica Scontrino') ?>
    <?= $form->field($model, 'modoscansione')->dropdownList(['1' => '1 - Segmentazione automatica della pagina con riconoscimento automatico dell\'orientamento pagina', '2' => '2 - Segmentazione automatica della pagina, nessun riconoscimento automatico', '3' => '3 - Segmentazione automatica completa'], ['prompt' => '---Seleziona tipo PSM---'])->hint('Inserisci la modalità con la quale vuoi eseguire la scansione')->label('Modo Scansione') ?>
    <?= $form->field($model, 'enginescansione')->dropdownList(['1' => '1 - Utilizza l\'intelligenza artificiale per il riconoscimento delle singole righe', '2' => '2 - Utilizza l\'intelligenza artificiale per il riconoscimento delle singole righe, ma lascia a Tesseract la decisione se le cose si complicano', '3' => '3 - Modalità di default'], ['prompt' => '---Seleziona tipo LSTM---'])->hint('Inserisci la modalità con la quale vuoi eseguire la scansione')->label('Engine Scansione') ?>
    <?= $form->field($model, 'dpiscansione')->dropdownList(['150' => 'Elabora lo scontrino a 150dpi', '200' => 'Elabora lo scontrino a 200dpi', '300' => 'Elabora lo scontrino a 300dpi', '400' => 'Elabora lo scontrino a 400dpi'], ['prompt' => '---Seleziona DPI---'])->hint('Inserisci i DPI con i quali vuoi eseguire la scansione, più è alto il numero più sarà lenta la scansione')->label('DPI Scansione') ?>
    <?= $form->field($model, 'raddrizzascansione')->dropdownList(['0' => 'No', '1' => 'Si'], ['prompt' => '---Raddrizza Foto---'])->hint('Vuoi che il sistema provi a raddrizzare la tua foto per migliorare la scansione?')->label('Raddrizza Scansione')  ?>
    <div>
        <?= Html::submitButton('Carica', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
