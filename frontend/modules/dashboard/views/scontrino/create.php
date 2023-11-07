<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */

$this->title = 'Carica scontrino';
?>

<div class="row">
    <div class="col-12 col-md-8">
        <div class="card shadow-sm">
            <div class="scontrino-create card-body" id="gioco">
                <?= $this->render('_form_create', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>

<style>
    #newScontrino {
        display: none;
    }
</style>
