<?php
use yii\bootstrap4\Html;
use yii\widgets\Menu;

$module_id = \Yii::$app->controller->module->id;
?>
<ul class="navbar-nav bg-gradient-light sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand <?php if (false) : ?>d-flex align-items-center justify-content-center <?php endif; ?>" href="<?=\Yii::getAlias('@web/dashboard') ?>">
        <div class="sidebar-brand-icon  p-1">
            <?= Html::img('@web/images/logo.png', ['alt' => \Yii::$app->name, 'class' => 'img-fluid']) ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=\Yii::getAlias('@web/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Gestione
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (Yii::$app->user->can('accessBusinessTools')) : ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBusiness"
            aria-expanded="true" aria-controls="collapseBusiness">
            <i class="fas fa-fw fa-tools"></i>
            <span>Strumenti aziendali</span>
        </a>
        <div id="collapseBusiness" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
            $menu_items = [
                [
                    'label' => 'Ritira coupon', 
                    'url' => ['/dashboard/coupon/validate', 'mode' => 'manual'], 
                    'active' => ($module_id == 'dashboard' && $this->context->id == 'coupon' && $this->context->action->id == 'validate')],
                [
                    'label' => 'Coupon ritirati', 
                    'url' => ['/dashboard/coupon/report'], 
                    'active' => ($module_id == 'dashboard' && $this->context->id == 'coupon' && $this->context->action->id == 'report')],
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
    <?php endif; ?>

    <li class="nav-item <?= ($module_id == 'dashboard' && $this->context->id == 'scontrino') ? 'active' : '' ?>">
        <?= Html::a( '<i class="fas fa-fw fa-list"></i> <span>Scontrini</span>', ['/dashboard/scontrino/index'], ['class' => 'nav-link']) ?>
    </li>

    <li class="nav-item <?= ($module_id == 'dashboard' && $this->context->id == 'coupon') ? 'active' : '' ?>">
        <?= Html::a( '<i class="fas fa-fw fa-barcode"></i> <span>Coupon</span>', ['/dashboard/coupon/index'], ['class' => 'nav-link']) ?>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (false) : ?>
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
    <?php endif; ?>

    <!-- Nav Item - Pages Collapse Menu -->
    <!--<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendite"
            aria-expanded="true" aria-controls="collapseVendite">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Vendite</span>
        </a>
        <div id="collapseVendite" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            <?php
/*             $menu_items = [
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
            ]); */
            ?>
            </div>
        </div>
    </li>-->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>