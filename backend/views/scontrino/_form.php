<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Scontrino $model */
/** @var yii\widgets\ActiveForm $form */
$opts = \Yii::$app->opts;

$this->registerJs(
    "const markObj = new Mark(document.querySelector(\"div.articoli-scontrino\"));",
    $this::POS_END,
    'mark-handler'
);

// Ricava le keyword da evidenziare
$lista_keyword = ['pane', 'latte', 'bicchiere', 'patate', 'carne', 'acqua'];
$command = '';
foreach ($lista_keyword as $keyword) {
    $command .= ".mark('{$keyword}')";
}
$command .= ';';
$this->registerJs("markObj{$command}", $this::POS_END, 'mark-exec');

?>

<style>
mark {
    color: red;
}
</style>

<div class="scontrino-form row">

    <div class="col-8">
        <h5>Dettagli</h5>
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'offset-sm-3',
                'wrapper' => 'col-sm-9',
            ],
        ],
        'options' => ['enctype' => 'multipart/form-data',
    ]]); ?>

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
    <div class="col">
        <?php 
        $items = $model->getItems();
        $count = count($items);
        ?>
        <h5>Articoli ricavati</h5>
        <div class="articoli-scontrino">
            <table class="table table-xs">
            <?php foreach ($items as $item) : ?>
            <tr>
                <td width="80%"><?= $item['description'] ?></td>
                <td class="text-end"><?= \Yii::$app->formatter->asCurrency((float)$item['amount']) ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
