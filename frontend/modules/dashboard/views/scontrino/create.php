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
                    'numero_scontrini' => $numero_scontrini,
                ]) ?>

                <hr />
                <h5 class="h5 mt-2 mb-2">Come funziona?</h5>
                <p>Raccogliere punti è semplice. Inquadra e scatta una foto dello scontrino di un punto vendita per scoprire subito se hai vinto.<br>
                L'applicazione si occuperà del resto. Se nel tuo scontrino risulteranno i prodotti inclusi nella raccolta punti, riceverai tanti punti quanti sono i prodotti che hai acquistato.</p>
            </div>
        </div>
    </div>
</div>

<style>
    #newScontrino {
        display: none;
    }
</style>
