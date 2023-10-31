<div class="col col-md-6">
    <div class="card shadow-sm mb-4">
        <div class="card-body p-1">
            <div class="row">
                <div class="col-12 col-md-4 text-center">
                    <img src="<?= $model->qRCode ?>" class="img-fluid" />
                </div>
                <div class="col">
                    <div class="p-4 py-md-3 px-md-0">
                    <h3>Valore: <span class="text-success"><?= $model->etichettaValore ?></span></h3>
                    <h6><span class="text-muted">CODICE:</span> <?= $model->codice ?></h6>
                    <ul class="list-unstyled mb-0">
                        <li>Stato: <?= ($model->status) ? '<span class="text-success">ATTIVO</span>' : '<span class="text-danger font-weight-bold">UTILIZZATO</span>' ?></li>
                        <?php if (!$model->status) : ?>
                        <li>Data Utilizzo: <?= date('d/m/Y H:i:s', strtotime($model->data_utilizzo)) ?></li>
                        <?php endif; ?>
                        <?php if ($model->data_scadenza) : ?>
                        <li>Da utilizzare entro il <?= date('d/m/Y', strtotime($model->data_scadenza)) ?></li>
                        <?php else: ?>
                        <li>Data Scadenza: Nessuna</li>
                        <?php endif; ?>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>