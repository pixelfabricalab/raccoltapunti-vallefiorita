<div class="col col-md-6">
    <div class="card shadow-sm mb-4">
        <div class="card-body p-1">
            <div class="row">
                <div class="col-6 col-md-3">
                    <img src="<?= $model->qRCode ?>" />
                </div>
                <div class="col">
                    <div class="p-3">
                    <h3>Valore: <span class="text-success"><?= $model->sconto_percentuale ?> % </span></h3>
                    <h6><span class="text-muted">CODICE:</span> <?= $model->codice ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>