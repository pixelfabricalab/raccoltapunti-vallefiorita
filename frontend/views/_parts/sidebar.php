<?php
use yii\bootstrap4\Html;
use yii\widgets\Menu;

$module_id = \Yii::$app->controller->module->id;
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=\Yii::getAlias('@web/dashboard') ?>">
        <div class="sidebar-brand-icon bg-white p-1">
            <?= Html::img('@web/images/logo.png', ['alt' => \Yii::$app->name, 'class' => 'img-fluid']) ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=\Yii::getAlias('@web/dashboard') ?>">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttivita"
            aria-expanded="true" aria-controls="collapseAttivita">
            <i class="fas fa-fw fa-file"></i>
            <span>Raccolta punti</span>
        </a>
        <div id="collapseAttivita" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Scontrini', 
                    'url' => ['/dashboard/scontrino/index'], 
                    'active' => ($module_id == 'magazzino' && $this->context->id == 'articolo')],
                [
                    'label' => 'Punti vendita', 
                    'url' => ['/dashboard/puntovendita/index'], 
                    'active' => (\Yii::$app->controller->module->id == 'dashboard' && $this->context->id == 'puntovendita')],
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Account</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Profilo', 
                    'url' => ['/dashboard/profilo/index'], 
                    'active' => ($module_id === 'dashboard' && $this->context->id == 'profilo')],
                [
                    'label' => 'Storico', 
                    'url' => ['/dashboard/report/index'], 
                    'active' => ($module_id === 'dashboard' && $this->context->id == 'report')],
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
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>