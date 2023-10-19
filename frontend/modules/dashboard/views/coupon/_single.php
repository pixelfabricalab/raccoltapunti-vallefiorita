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
                    <ul class="list-unstyled mb-0">
                        <li>Stato: <?= ($model->status) ? '<span class="text-success">ATTIVO</span>' : '<span class="text-danger">NON ATTIVO</span>' ?></li>
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