<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Scontrino $model */

$this->title = 'Update Scontrino: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scontrini', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scontrino-update">

    <div class="row">
        <div class="col">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        
        <?php if ($model->filename) : ?>
            <div class="col-4">
                <img src="data:<?= $model->mimeType ?>;base64,<?= $model->fileEncode ?>" class="img-fluid" />
            </div>

            <img src="data:image/jpeg;base64,<?= $model->resized; ?>" class="img-fluid" />
        <?php endif; ?>
        </div>
</div>
