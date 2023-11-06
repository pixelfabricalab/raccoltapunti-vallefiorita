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
        Gestionale
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArchivi"
            aria-expanded="true" aria-controls="collapseArchivi">
            <i class="fas fa-fw fa-database"></i>
            <span>Archivi</span>
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
                    'label' => 'Aziende', 
                    'url' => ['/business/index'], 
                    'active' => ($ctx->id == 'business')],
                [
                    'label' => 'Coupon', 
                    'url' => ['/coupon/index'], 
                    'active' => ($ctx->id == 'coupon')],
                /*
                [
                    'label' => 'Punti vendita', 
                    'url' => ['/puntovendita'], 
                    'active' => ($ctx->id == 'puntovendita')],
                */
                [
                    'label' => 'Scontrini', 
                    'url' => ['/scontrino/index'], 
                    'active' => ($ctx->id == 'scontrino')],
                /*
                [
                    'label' => 'Campagne', 
                    'url' => ['/campagna/index'], 
                    'active' => ($this->context->id == 'campagna')],
                [
                    'label' => 'Premi', 
                    'url' => ['/premio/index'], 
                    'active' => ($this->context->id == 'premio')],
                */
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

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>