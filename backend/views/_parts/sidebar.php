<?php
use yii\bootstrap5\Html;
use yii\widgets\Menu;
use yii\helpers\Url;

$ctx = $this->context;
?>
<ul class="navbar-nav bg-gradient-primary sidebar <?= ($sidebarToggled == '1') ? 'toggled' : '' ?> sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php if (false) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=\Yii::getAlias('@web') ?>">
        <div class="sidebar-brand-icon">
            <?= Html::img('@web/images/logo_small.png', ['alt' => 'Fidelpol']) ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php endif; ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=\Yii::getAlias('@web') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Contratti e Fatturazione
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDocumenti"
            aria-expanded="true" aria-controls="collapseDocumenti">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Documenti</span>
        </a>
        <div id="collapseDocumenti" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <?php
            $menu_items = [
                [
                    'label' => 'Contratti', 
                    'url' => ['/contratto/create'], 
                    'active' => ($ctx->id == 'contratto' && in_array($ctx->action->id, ['index', 'update', 'create', 'aggiorna-articolo', 'articolo']))],
                [
                    'label' => 'Fatturazione contratti', 
                    'url' => ['/fatturazione/fattura/emissione'], 
                    'active' => ($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['emissione']))],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            <hr class="my-2" />
            <?php
            $menu_items = [
                [
                    'label' => 'Fatture di vendita', 
                    'url' => ['/fatturazione/fattura/index'], 
                    'active' => ($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['index', 'update']))],
                [
                    'label' => 'Fatture provvisorie', 
                    'url' => ['/fatturazione/fattura/report'], 
                    'active' => ($ctx->module->id == 'fatturazione' && $ctx->id == 'fattura' && in_array($ctx->action->id, ['report']))],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>            
            <?php if (false) : ?>
            <hr class="my-2" />
            <?php
            $menu_items = [
                [
                    'label' => 'Configurazione', 
                    'url' => ['/fatturazione/configurazione'], 
                    'active' => ($ctx->module->id == 'fatturazione' && $ctx->id == 'configurazione' && in_array($ctx->action->id, ['index', 'create', 'update']))],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            <?php endif; ?>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArchivi"
            aria-expanded="true" aria-controls="collapseArchivi">
            <i class="fas fa-fw fa-database"></i>
            <span>Archivi di Base</span>
        </a>
        <div id="collapseArchivi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <?php
            $menu_items = [
                [
                    'label' => 'Profili', 
                    'url' => ['/profilo/index'], 
                    'active' => ($ctx->id == 'profilo')],
                [
                    'label' => 'Coupon', 
                    'url' => ['/coupon/index'], 
                    'active' => ($ctx->id == 'coupon')],
                [
                    'label' => 'Punti vendita', 
                    'url' => ['/puntovendita'], 
                    'active' => ($ctx->id == 'puntovendita')],
                [
                    'label' => 'Scontrini', 
                    'url' => ['/scontrino/index'], 
                    'active' => ($ctx->id == 'scontrino')],
                [
                    'label' => 'Clienti', 
                    'url' => ['/cliente/index'], 
                    'active' => ($ctx->id == 'cliente' && in_array($ctx->action->id, ['index', 'create', 'update']))],
                [
                    'label' => 'Campagne', 
                    'url' => ['/campagna/index'], 
                    'active' => ($this->context->id == 'campagna')],
                [
                    'label' => 'Premi', 
                    'url' => ['/premio/index'], 
                    'active' => ($this->context->id == 'premio')],
                [
                    'label' => 'Fornitori', 
                    'url' => ['/fornitore/index'], 
                    'active' => ($ctx->id == 'fornitore' && in_array($ctx->action->id, ['index', 'create', 'update']))],
                [
                    'label' => 'Beni e servizi', 
                    'url' => ['/fatturazione/articolo/index'], 
                    'active' => ($ctx->module->id == 'fatturazione' && $ctx->id == 'articolo' && in_array($ctx->action->id, ['index', 'create', 'update']))],
                ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            <?php if (false) : ?>
            <hr class="my-2" />
            <?php
            $menu_items = [
                [
                    'label' => 'Configurazione', 
                    'url' => ['/fatturazione/configurazione'], 
                    'active' => ($ctx->module->id == 'fatturazione' && $ctx->id == 'configurazione' && in_array($ctx->action->id, ['index', 'create', 'update']))],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            <?php endif; ?>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMagazzino"
            aria-expanded="true" aria-controls="collapseMagazzino">
            <i class="fas fa-fw fa-folder"></i>
            <span>Profility Stats</span>
        </a>
        <div id="collapseMagazzino" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Statistiche Generali', 
                    'url' => ['/statistiche/generali'], 
                    'active' => ($this->context->id == 'generali')],
                [
                    'label' => 'Partecipanti', 
                    'url' => ['/statistiche/partecipanti'], 
                    'active' => ($this->context->id == 'partecipanti')],
                [
                    'label' => 'Regimi Spesa', 
                    'url' => ['/statistiche/regimi-spesa'], 
                    'active' => ($this->context->id == 'regimispesa')],
                [
                    'label' => 'Statistiche prodotti', 
                    'url' => ['/statistiche/prodotti'], 
                    'active' => ($this->context->id == 'prodotti')],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (false) : ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseContabilita"
            aria-expanded="true" aria-controls="collapseContabilita">
            <i class="fas fa-fw fa-file"></i>
            <span>Contabilita</span>
        </a>
        <div id="collapseContabilita" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Prima Nota', 
                    'url' => ['/contabilita/primanota/index'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'primanota')],
                [
                    'label' => 'Brogliaccio Prima Nota', 
                    'url' => ['/contabilita/brogliaccio/index'],
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'brogliaccio')],
                [
                    'label' => 'Mastrini', 
                    'url' => ['/contabilita/mastrino/index'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'mastrino')],
                [
                    'label' => 'Bilancio', 
                    'url' => ['/site/disabled'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'bilancio')],
                [
                    'label' => 'Situazione Contabile', 
                    'url' => ['/site/disabled'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'situazionecontabile')],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            <?php if (false) : ?>
                <h6 class="collapse-header">Gestione IVA</h6>

            <?php
            $menu_items = [
                [
                    'label' => 'Registri IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'registroiva')],
                [
                    'label' => 'Liquidazione IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'liquidazione')],
                [
                    'label' => 'Progressivi IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'progressivoiva')],
                [
                    'label' => 'Liquid. periodiche IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => ($ctx->module->id == 'contabilita' && $ctx->id == 'liquidazione')],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            <?php endif; ?>

            </div>
        </div>
    </li>

    <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCentrocontrollo"
            aria-expanded="true" aria-controls="collapseCentrocontrollo">
            <i class="fas fa-fw fa-bell"></i>
            <span>Centro di controllo</span>
        </a>
        <div id="collapseCentrocontrollo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Notifiche', 
                    'url' => ['/notifica/index'], 
                    'active' => ($ctx->id == 'notifica')],
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'list-unstyled',
                ],
                'itemOptions' => [
                    'class' => 'collapse-item',
                ],
                'items' => $menu_items,
            ]);
            ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistema
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tabelle</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                $menu_items = [
                    [
                        'label' => 'Apparecchi', 
                        'url' => ['/apparecchiatura/index'], 
                        'active' => ($ctx->id == 'apparecchiatura')],
                    [
                        'label' => 'Banche', 
                        'url' => ['/banca/index'], 
                        'active' => ($ctx->id == 'banca')],
                    [
                        'label' => 'Categorie Merce.', 
                        'url' => ['/categoria-merceologica/index'], 
                        'active' => ($ctx->id == 'categoria-merceologica')],
                    [
                        'label' => 'Documenti', 
                        'url' => ['/tipo-documento/index'], 
                        'active' => ($ctx->id == 'tipo-documento')],
                    [
                        'label' => 'Localita', 
                        'url' => ['/localita/index'], 
                        'active' => ($ctx->id == 'localita')],
                    [
                        'label' => 'Manutenzioni', 
                        'url' => ['/tipo-manutenzione/index'], 
                        'active' => ($ctx->id == 'tipo-manutenzione')],
                    [
                        'label' => 'Rubrica', 
                        'url' => ['/indirizzo/index'], 
                        'active' => ($ctx->id == 'indirizzo')],
                    [
                        'label' => 'Sezionali', 
                        'url' => ['/sezionale/index'], 
                        'active' => ($ctx->id == 'sezionale')],
                    [
                        'label' => 'Tipi pagamento', 
                        'url' => ['/tipopagamento/index'], 
                        'active' => ($ctx->id == 'tipopagamento')],
                ];
                echo Menu::widget([
                    'options' => [
                        'class' => 'list-unstyled',
                    ],
                    'itemOptions' => [
                        'class' => 'collapse-item',
                    ],
                    'items' => $menu_items,
                ]);
                ?>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseImpostazioni"
            aria-expanded="true" aria-controls="collapseImpostazioni">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Impostazioni</span>
        </a>
        <div id="collapseImpostazioni" class="collapse" aria-labelledby="headingImpostazioni" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                $menu_items = [
                    [
                        'label' => 'Configurazione', 
                        'url' => ['/impostazione/config'], 
                        'active' => ($ctx->id == 'impostazione' && $ctx->action->id == 'config')],
                    [
                        'label' => 'Adeg.to ISTAT', 
                        'url' => ['/impostazione/istat'], 
                        'active' => ($ctx->id == 'impostazione' && $ctx->action->id == 'istat')],
                    [
                        'label' => 'Utenti', 
                        'url' => ['/utente/index'], 
                        'active' => ($ctx->id == 'utente')],

                ];
                echo Menu::widget([
                    'options' => [
                        'class' => 'list-unstyled',
                    ],
                    'itemOptions' => [
                        'class' => 'collapse-item',
                    ],
                    'items' => $menu_items,
                ]);
                ?>
            </div>
        </div>
    </li>



    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>