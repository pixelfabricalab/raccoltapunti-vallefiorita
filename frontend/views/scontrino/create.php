<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scontrino */

$this->title = 'Inizia a raccogliere i punti';
?>
<div class="scontrino-create container" id="gioco">
    <h1><?= Html::encode($this->title) ?></h1>
    <div v-if="stepgioco === 0">
        <div class="row">
            <div class="col">
                <h3>Come si gioca?</h3>
                <p>La raccolta punti è semplicissima. Ti basta inquadrare e scattare una foto ad uno scontrino di un punto vendita per scoprire subito se hai vinto.</p>
                <p>L'applicazione si occuperà del resto. Se nel tuo scontrino risulteranno i prodotti inclusi nella raccolta punti, riceverai tanti punti quanti sono i prodotti che hai acquistato.</p>
                <button class="btn btn-primary" @click="stepgioco = 1">Inizia subito</button>
            </div>
        </div>
    </div>
    <div v-else-if="stepgioco === 1">
        <?= $this->render('_form_create', [
            'model' => $model,
        ]) ?>
    </div>

</div>
