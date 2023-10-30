<?php
use yii\bootstrap5\Html;
?>
<div class="col-12 col-md-6">
    <div class="card shadow-sm mb-4">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img src="data:<?= $model->mimeType ?>;base64,<?= $model->resized ?>" class="img-fluid shadow p-1" />
                </div>
                <div class="col">
                    <div class="py-3">
                        <h5 class="esercente title">Informazioni rilevate</h5>
                        <h6><?= $model->ragione_sociale ?></h6>
                        P.IVA: <strong><?= $model->partita_iva ?></strong><br />
                        TOTALE DOC.: <strong>€ <?= number_format($model->totale, 2, ',', '.') ?></strong>
                        <hr />
                        <h6>Articoli</h6>
                        <ul>
                        <?php foreach ($model->getItems() as $item) : ?>
                        <li><?= $item['description'] ?> - € <?= number_format($item['amount'], 2, ',', '.') ?></li>
                        <?php endforeach; ?>
                        </ul>
                        <div class="text-end">
                            <?php if (!$model->coupon) : ?>
                            <?= Html::a('Richiedi Coupon', ['coupon/create', 'sid' => $model->sid], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?php else: ?>
                            &#x2705; Coupon già richiesto 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        
