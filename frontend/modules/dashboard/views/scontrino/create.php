<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scontrino */

$this->title = 'Carica scontrino';
?>
<div class="scontrino-create" id="gioco">
    <div v-if="stepgioco === 0">
        <div class="row">
            <div class="col">
                <h4>Come si gioca?</h4>
                <p>La raccolta punti è semplicissima. Ti basta inquadrare e scattare una foto ad uno scontrino di un punto vendita per scoprire subito se hai vinto.</p>
                <p>L'applicazione si occuperà del resto. Se nel tuo scontrino risulteranno i prodotti inclusi nella raccolta punti, riceverai tanti punti quanti sono i prodotti che hai acquistato.</p>
                <button class="btn btn-primary" @click="stepgioco = 1">Inizia subito</button>
            </div>
        </div>
    </div>
    <div v-else-if="stepgioco === 1">
        <?= $this->render('_form_create', [
            'model' => $model,
            'numero_scontrini' => $numero_scontrini,
        ]) ?>
    </div>

</div>
