<?php
use yii\helpers\Html;
use common\models\Coupon;
?>
<div class="col col-md-6">
    <div class="card shadow-sm mb-4">
        <div class="card-body p-1">
            <div class="row">
                <div class="col-12 col-md-4 text-center">
                    <img src="<?= $model->qRCode ?>" class="img-fluid" />
                </div>
                <div class="col">
                    <div class="p-4 py-md-3 pl-md-0">
                        <h3>Valore: <span class="text-success"><?= $model->etichettaValore ?></span></h3>
                        <code><span class="text-muted">CODICE:</span> <?= $model->codice ?></code>
                        <ul class="list-unstyled mb-0">
                            <li>Stato: 
                                <?php if ($model->status == Coupon::STATUS_ATTIVO) : echo '<span class="badge bg-success">ATTIVO</span>'; endif; ?>
                                <?php if ($model->status == Coupon::STATUS_DISATTIVO) : echo '<span class="badge bg-info text-light">DA CONVALIDARE</span>'; endif; ?>
                                <?php if ($model->status == Coupon::STATUS_RITIRATO) : echo '<span class="badge bg-danger text-light">RITIRATO</span>'; endif; ?>
                                <?php if ($model->status == Coupon::STATUS_RITIRATO && $model->data_utilizzo) : ?> il <?= date('d/m/Y H:i:s', strtotime($model->data_utilizzo)) ?><?php endif; ?>
                            </li>
                            
                            <?php if ($model->data_scadenza) : ?>
                            <li>Da utilizzare entro il <?= date('d/m/Y', strtotime($model->data_scadenza)) ?></li>
                            <?php endif; ?>
                        </ul>

                        <?php if ($model->canBeRitirato()) : ?>
                        <?= Html::a("Ritira", ['validate', 'codice' => $model->codice, 'confirm' => 1], ['class' => 'mt-4 btn btn-lg btn-success btn-block']) ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>