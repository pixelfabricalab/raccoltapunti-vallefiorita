<?php
use yii\helpers\Url;
?>

<div class="container-fluid">
    <div class="position-relative overflow-hidden hero-back">
        <div class="col-md-6 my-5 offset-md-1 mb-1">
            <div class="herotext">
                <h1 class="display-4 hero-title">Raccolta punti</h1>
                <p class="lead fw-normal hero-desc">Una raccolta punti non è mai stata così semplice.<br />Inquadra lo scontrino, scatta una foto e inviala con l'applicazione!</p>
                <a class="btn btn-profility" href="<?= Url::toRoute('//dashboard/scontrino/create') ?>">Inizia subito</a>
            </div>
        </div>
    </div>    
</div>
