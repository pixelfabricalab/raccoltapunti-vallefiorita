<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Scontrino $model */

$this->title = 'Modifica Scontrino';
$this->params['breadcrumbs'][] = ['label' => 'Scontrini', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scontrino-update">

    <div class="row">
        <?php if ($model->filename) : ?>
            <div class="col-12 col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <img src="data:<?= $model->mimeType ?>;base64,<?= $model->fileEncode ?>" class="img-fluid" />
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
