<?php
use yii\bootstrap5\Html;
use yii\helpers\Url;

$items = $model->getItems();
$count = count($items);
?>
<div class="col-12 <?= (isset($full) && $full) ? 'col-md-6' : 'col-md-4' ?>">
    <div class="card shadow-sm mb-4">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-12 col-md-4">
                    <a href="<?= Url::to(['view', 'id' => $model->sid]) ?>">
                    <img src="data:<?= $model->mimeType ?>;base64,<?= $model->resized ?>" class="img-fluid shadow p-1" />
                    </a>
                </div>
                <div class="col">
                    <div class="py-3">
                        <h6><?= $model->ragione_sociale ?></h6>
                        P.IVA: <strong><?= $model->partita_iva ?></strong><br />
                        TOTALE DOC.: <strong>€ <?= number_format($model->totale, 2, ',', '.') ?></strong><br/>
                        ARTICOLI: <strong><?= $count ?></strong>
                        <?php if (isset($full) && $full) : ?>
                        <ul>
                        <?php foreach ($items as $item) : ?>
                        <li><small><?= \Yii::$app->formatter->asCurrency((float)$item['amount']) ?> - <?= $item['description'] ?></small></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>

                        <?php if (!$model->coupon) : ?>
                        <?= Html::a('Richiedi Coupon', ['coupon/create', 'sid' => $model->sid], ['class' => 'btn btn-primary btn-sm btn-block mt-3']) ?>
                        <?php else: ?>
                        <div class="mt-2">
                        &#x2705; Coupon emesso in data <?= \Yii::$app->formatter->asDate($model->coupon->creato_il) ?> 
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        
