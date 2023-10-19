<div class="col col-md-6">
    <div class="card shadow-sm mb-4">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-6 col-md-3">
                    <img src="data:<?= $model->mimeType ?>;base64,<?= $model->resized ?>" class="img-fluid shadow p-1" />
                </div>
                <div class="col">
                    <div class="py-3">
                        <h5 class="esercente title">Informazioni rilevate</h5>
                        <h6><?= $model->ragione_sociale ?></h6>
                        P.IVA: <strong><?= $model->partita_iva ?></strong>
                        <hr />
                        <h6>Articoli</h6>
                        <ul>
                        <?php foreach ($model->getItems() as $item) : ?>
                        <li><?= $item['description'] ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        
