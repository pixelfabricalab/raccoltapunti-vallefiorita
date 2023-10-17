<?php
use yii\bootstrap5\Html;
use backend\modules\fatturazione\models\Fattura;

$ctx = $this->context;
$createId = 'create' . ucfirst($ctx->id);
$backto = $ctx->id . '/' . $ctx->action->id . '?id=' . $ctx->request->get('id');

?>
<?php if ($ctx->showToolbar) : ?>
<div id="toolbar" class="text-end">

        <?= Html::a('<i class="fas fa-fw fa-search"></i> Ricerca', ['index'], ['class' => 'btn btn-sm btn-outline-primary']) ?>
        <?= Html::a('<i class="fas fa-fw fa-plus"></i> Inserisci', ['create'], ['class' => 'btn btn-sm btn-outline-success', 'id' => $createId]) ?>
        <?php if ($ctx->id == 'fattura') : ?>
        <?= Html::a('<i class="fas fa-fw fa-cogs"></i> Fatture provvisorie', ['report'], ['class' => 'btn btn-sm btn-outline-primary', 'id' => $createId]) ?>
        <?php endif; ?>
        <?php if (in_array($ctx->action->id, ['create'])) : ?>
        <?= Html::a('<i class="fas fa-fw fa-paperclip"></i> Allegati', ['create'], ['class' => 'btn btn-sm btn-outline-info', 'id' => 'attachDisabled']) ?>
        <?php endif; ?>
        <?php if (!in_array($ctx->action->id, ['create', 'index'])) : ?>
        <?php 
        $btnAttachmentParams = [
            'class' => 'btn btn-sm btn-outline-secondary', 
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#attachmentModal',
            'data-bs-title' => 'Aggiungi allegato',
            'data-bs-backto' => $backto
        ];

        if ($ctx->id == 'agente') {
            $btnAttachmentParams['data-bs-agente_id'] = $ctx->request->get('id');
        }
        if ($ctx->id == 'contratto') {
            $numero_contratto = $ctx->request->get('id');
            $btnAttachmentParams['data-bs-contratto'] = $numero_contratto;
            $btnAttachmentParams['data-bs-title'] .= ' al contratto n. ' . $numero_contratto;
        }
        ?>
        <?= Html::a('<i class="fas fa-fw fa-paperclip text-info"></i> Allegati', ['index'], $btnAttachmentParams) ?>
        <div class="btn-group">
            <div class="dropdown">
            <a class="btn btn-outline-secondary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Azioni
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <!-- <li><?= Html::a('<i class="fas fa-fw fa-paper-plane"></i> Invia Email', ['index'], ['class' => 'dropdown-item']) ?></li> -->
                <!-- <li><?= Html::a('<i class="fas fa-fw fa-bell"></i> Notifica', ['index'], ['class' => 'dropdown-item']) ?></li> -->
                
                <?php if (($ctx->id == 'contratto' && in_array($ctx->action->id, ['update']))) : ?>
                <li><?= Html::a('<i class="fas fa-fw fa-sync"></i> Ripristina Arrot.', ['ripristina-arrotondamenti', 'id' => \Yii::$app->request->get('id')], ['class' => 'dropdown-item']) ?></li>
                <?php endif; ?>

                <?php if (!($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['report', 'emissione']))) : ?>
                <li><?= Html::a('<i class="fas fa-fw fa-print"></i> Stampa', ['stampa', 'id' => \Yii::$app->request->get('id')], ['class' => 'dropdown-item', 'target' => '_blank']) ?></li>
                <?php endif; ?>

                <?php if ($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['', 'update'])) : ?>
                <?php $model = Fattura::findOne($ctx->request->get('id')); ?>
                <?php if ($model->evidenzia) : ?>
                <li><?= Html::a('<i class="fas fa-fw fa-check text-success"></i> Verificata', ['evidenzia', 'id' => \Yii::$app->request->get('id')], ['class' => 'dropdown-item']) ?></li>
                <?php else : ?>
                <li><?= Html::a('<i class="fas fa-fw fa-exclamation text-warning"></i> Da Verificare', ['evidenzia', 'id' => \Yii::$app->request->get('id')], ['class' => 'dropdown-item']) ?></li>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['report', 'emissione'])) : ?>
                <li><?= Html::a('<i class="fas fa-fw fa-print"></i> Stampa', ['//print/fatture', 'sezionale' => 'A', 'num_inizio' => 0, 'num_fine' => 0], ['class' => 'dropdown-item', 'target' => '_blank']) ?></li>
                <li><?= Html::a('<i class="fas fa-fw fa-cogs text-success"></i> Rendi definitive', ['definitive', 'token' => \Yii::$app->request->get('token'), 'mese' => \Yii::$app->request->get('mese')], ['class' => 'dropdown-item', 'data' => [
                    'confirm' => 'L\'operazione assegna un numero progressivo alle fatture, le segna come verificate e non sarà possibile cancellarle.',
                ]]) ?></li>
                <?php endif; ?>

                <?php if ($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['emissione', 'report'])) : ?>
                <li><?= Html::a('<i class="fas fa-fw fa-trash text-danger"></i> Elimina provvisorie', ['elimina-provvisorie', 'id' => \Yii::$app->request->get('id')], [
                    'class' => 'dropdown-item',
                    'data' => [
                        'confirm' => 'Sei sicuro? L\'operazione non è reversibile',
                        'method' => 'post',
                    ],
                ]) ?></li>

            
                <?php endif; ?>
            </ul>
            </div>
        </div>
        <?php endif; ?>
        <?php if (in_array($ctx->action->id, ['update', 'view'])) : ?>
        <?= Html::a('<i class="fas fa-fw fa-paperclip text-danger"></i> Elimina', ['delete', 'id' => \Yii::$app->request->get('id')], [
            'class' => 'btn btn-outline-danger btn-sm',
            'data' => [
                'confirm' => 'Sei sicuro? L\'operazione non è reversibile',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
</div>
<?php endif; ?>