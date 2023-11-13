<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Configuration $model */
/** @var ActiveForm $form */
?>
<div class="config-_form row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-3',
                    'offset' => 'offset-sm-3',
                    'wrapper' => 'col-sm-9',
                ],
            ],
        ]); ?>

            <?php foreach ($settings as $i => $model) : ?>
                <?= $form->field($model, '[' . $i . ']cfg_key', ['options' => ['tag' => false]])->hiddenInput()->label(false) ?>
                <?= $form->field($model, '[' . $i . ']cfg_val')->label($model->etichetta) ?>
            <?php endforeach; ?>
        
            <div class="form-group">
                <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div><!-- config-_form -->
