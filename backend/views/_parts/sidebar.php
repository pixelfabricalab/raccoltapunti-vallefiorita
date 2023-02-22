<?php
use yii\bootstrap4\Html;
use yii\widgets\Menu;
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=\Yii::getAlias('@web') ?>">
        <div class="sidebar-brand-icon">
            <!--<?= Html::img('@web/images/logo_small.png', ['alt' => 'Fidelpol']) ?>-->
            Profility
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

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
        Gestione
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Gestione</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Scansioni', 
                    'url' => ['/scansione/index'], 
                    'active' => ($this->context->id == 'scansione')],
                [
                    'label' => 'Campagne', 
                    'url' => ['/campagna/index'], 
                    'active' => ($this->context->id == 'campagna')],
                [
                    'label' => 'Premi', 
                    'url' => ['/premio/index'], 
                    'active' => ($this->context->id == 'premio')],

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

                <!--
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
                -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (false) : ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMagazzino"
            aria-expanded="true" aria-controls="collapseMagazzino">
            <i class="fas fa-fw fa-file"></i>
            <span>Magazzino</span>
        </a>
        <div id="collapseMagazzino" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Anagrafica Articoli', 
                    'url' => ['/magazzino/articolo/index'], 
                    'active' => (\Yii::$app->controller->module->id == 'magazzino' && $this->context->id == 'articolo')],
                [
                    'label' => 'Documenti di magazzino', 
                    'url' => ['/magazzino/ddt/create'], 
                    'active' => (\Yii::$app->controller->module->id == 'magazzino' && $this->context->id == 'ddt')],
                [
                    'label' => 'Stampe', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'bilancio')],
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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContabilita"
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
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'primanota')],
                [
                    'label' => 'Brogliaccio Prima Nota', 
                    'url' => ['/site/disabled']],
                [
                    'label' => 'Mastrini', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'mastrino')],
                [
                    'label' => 'Bilancio', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'bilancio')],
                [
                    'label' => 'Situazione Contabile', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'situazionecontabile')],
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
                <h6 class="collapse-header">Gestione IVA</h6>

            <?php
            $menu_items = [
                [
                    'label' => 'Registri IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'registroiva')],
                [
                    'label' => 'Liquidazione IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'liquidazione')],
                [
                    'label' => 'Progressivi IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'progressivoiva')],
                [
                    'label' => 'Liquid. periodiche IVA', 
                    'url' => ['/site/disabled'], 
                    'active' => (\Yii::$app->controller->module->id == 'contabilita' && $this->context->id == 'liquidazione')],
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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendite"
            aria-expanded="true" aria-controls="collapseVendite">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Vendite</span>
        </a>
        <div id="collapseVendite" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'DDT', 
                    'url' => ['/magazzino/ddt/create'], 
                    'active' => (\Yii::$app->controller->module->id == 'magazzino' && $this->context->id == 'ddt')],
                [
                    'label' => 'Emissione Fatture', 
                    'url' => ['/fatturazione/fattura/create?causale=VEN'], 
                    'active' => (\Yii::$app->controller->module->id == 'fatturazione' && $this->context->id == 'fattura')],
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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArcoeu"
            aria-expanded="true" aria-controls="collapseArcoeu">
            <i class="fas fa-fw fa-database"></i>
            <span>ArcoEU</span>
        </a>
        <div id="collapseArcoeu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Aziende', 
                    'url' => ['/arcoeu/azienda/index'], 
                    'active' => ($this->context->id == 'azienda' && \Yii::$app->controller->module->id == 'arcoeu')],
                [
                    'label' => 'Contratti', 
                    'url' => ['/arcoeu/contratto/index'], 
                    'active' => ($this->context->id == 'contratto' && \Yii::$app->controller->module->id == 'arcoeu')],
                [
                    'label' => 'Fatture', 
                    'url' => ['/arcoeu/fattura/index'], 
                    'active' => ($this->context->id == 'fattura' && \Yii::$app->controller->module->id == 'arcoeu')],
                [
                    'label' => 'Incassi/Pagamenti', 
                    'url' => ['/arcoeu/pagamento/index'], 
                    'active' => ($this->context->id == 'pagamento' && \Yii::$app->controller->module->id == 'arcoeu')],
                [
                    'label' => 'Articoli', 
                    'url' => ['/arcoeu/articolo/index'], 
                    'active' => ($this->context->id == 'articolo' && \Yii::$app->controller->module->id == 'arcoeu')],
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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDunia"
            aria-expanded="true" aria-controls="collapseDunia">
            <i class="fas fa-fw fa-database"></i>
            <span>Dunia</span>
        </a>
        <div id="collapseDunia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Guardie', 
                    'url' => ['/dunia/guard/index'], 
                    'active' => ($this->context->id == 'guard' && \Yii::$app->controller->module->id == 'dunia')],
                [
                    'label' => 'Allarmi', 
                    'url' => ['/dunia/alarm/index'], 
                    'active' => ($this->context->id == 'alarm' && \Yii::$app->controller->module->id == 'dunia')],
                [
                    'label' => 'Azioni', 
                    'url' => ['/dunia/geo-action/index'], 
                    'active' => ($this->context->id == 'geo-action' && \Yii::$app->controller->module->id == 'dunia')],
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

    <!-- Nav Item - Utilities Collapse Menu -->
    <!--
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>
    -->
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Statistiche
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Ambiti</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                $menu_items = [
                    [
                        'label' => 'Statistiche Generali', 
                        'url' => ['/azienda/index'], 
                        'active' => ($this->context->id == 'azienda')],
                    [
                        'label' => 'Partecipanti', 
                        'url' => ['/azienda/index'], 
                        'active' => ($this->context->id == 'azienda')],
                    [
                        'label' => 'Punti Vendita', 
                        'url' => ['/contratto/index'], 
                        'active' => ($this->context->id == 'contratto')],
                    [
                        'label' => 'Regimi di spesa', 
                        'url' => ['/tipo-documento/index'], 
                        'active' => ($this->context->id == 'tipo-documento')],
                    [
                        'label' => 'Statistiche prodotti', 
                        'url' => ['/servizio/index'], 
                        'active' => ($this->context->id == 'servizio')],
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
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>