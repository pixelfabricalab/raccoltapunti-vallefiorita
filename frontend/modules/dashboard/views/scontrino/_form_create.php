<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */
/* @var $uploadmodel frontend\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scontrino-form">
<div class="<?php if ($numero_scontrini > 2 && $numero_scontrini < 4) { ?>alert alert-warning<?php } else if ($numero_scontrini >= 4) {?> alert alert-danger <?php } else if ($numero_scontrini <= 2) {?> alert alert-success<?php } ?>"><p><strong>Attenzione!</strong><br />La piattaforma è in modalità di test. Le scansioni partono ogni 4 ore circa. Il numero consigliato di scontrini da caricare è 3-4.<br /><br />Numero scontrini in attesa di essere scansionati: <?= $numero_scontrini ?></p></div>
<?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']] // important
); ?>

    <?= $form->field($model, 'nomefile')->fileInput(['class' => 'form-control-file fileinput', 'accept' => 'image/*;capture=camera', 'capture' => true])->label('Carica Scontrino') ?>
    <div>
        <?= Html::submitButton('Carica', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
