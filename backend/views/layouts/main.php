<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Menu;
use yii\web\View;
use yii\helpers\Url;

AppAsset::register($this);
$this->registerJs("$('main input:not([type=\"checkbox\"]), main select, main textarea').addClass('form-control-sm');", View::POS_READY, 'input-small');
$this->registerJs("$('main button').addClass('btn-sm');", View::POS_READY, 'btn-small');
$this->registerJs("const csrf_param = '" . Yii::$app->request->csrfParam . "';", View::POS_HEAD, 'csrf_param');
$this->registerJs("const csrf_token = '" . Yii::$app->request->getCsrfToken() . "';", View::POS_HEAD, 'csrf');
$this->registerJs("const baseUrl = '" . Yii::getAlias('@web/') . "';", View::POS_HEAD, 'base-url');
$this->registerJs("const apiUrl = '" . Yii::getAlias('@web/api') . "';", View::POS_HEAD, 'api-url');
$this->registerJs("const sessione = {};", View::POS_HEAD, 'global-object');
$this->registerJs('$( "[type=\'reset\']" ).on( "click", function( event ) { $(this).closest(\'form\').trigger(\'reset\'); } );', yii\web\View::POS_READY);

$sidebarToggled = isset($_COOKIE['sidebarToggled']) ? $_COOKIE['sidebarToggled'] : '0';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script>
        const formatter = new Intl.NumberFormat('it-IT', {style: 'currency', currency: 'EUR'});
    </script>
</head>
<body class="d-flex flex-column h-100 <?= ($sidebarToggled == '1') ? 'sidebar-toggled' : '' ?>" id="page-top">
<?php $this->beginBody() ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->render('//_parts/sidebar', ['sidebarToggled' => $sidebarToggled]) ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" autocomplete="off" action="<?= Url::toRoute(['//cerca/result']) ?>">
                        <div class="input-group">
                            <?= Html::textInput('q', \Yii::$app->request->get('q'), ['class' => 'form-control bg-light small', 'placeholder' => "Cerca in fatture, clienti/fornitori, contratti", 'aria-label' => 'Cerca', 'id' => 'ricerca_globale']) ?>
                            <div class="input-group-append">
                                <button class="btn btn-muted" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Cerca&hellip;" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1 bg-success">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="newDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                NUOVO <i class="fas fa-plus fa-fw"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="newDropdown">
                                <a class="dropdown-item" href="<?= Url::toRoute(['//contratto/create']) ?>">
                                    <i class="fas fa-file fa-sm fa-fw mr-2 text-primary"></i>Contratto
                                </a>
                                <a class="dropdown-item" href="<?= Url::toRoute(['//cliente/create']) ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>Anagrafica
                                </a>
                                <a class="dropdown-item" href="<?= Url::toRoute(['//fatturazione/fattura/create']) ?>">
                                    <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-primary"></i>Fattura
                                </a>
                                <a class="dropdown-item" href="<?= Url::toRoute(['//pagamento/create']) ?>">
                                    <i class="fas fa-euro-sign fa-sm fa-fw mr-2 text-primary"></i>Pagamento
                                </a>
                                <a class="dropdown-item" href="<?= Url::toRoute(['//fatturazione/articolo/create']) ?>">
                                    <i class="fas fa-store fa-sm fa-fw mr-2 text-primary"></i>Prodotto
                                </a>
                                <!--
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                -->
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <?php
                        $notifiche_non_lette = [];
                        $num_notifiche = count($notifiche_non_lette); 
                        ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?= $num_notifiche ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    CENTRO DI CONTROLLO
                                </h6>
                                <?php foreach ($notifiche_non_lette as $not) : ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?= \Yii::$app->formatter->asDate($not->created_at) ?></div>
                                        <span class="font-weight-bold"><?= $not->subject ?></span>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                                <!-- 
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                -->
                                <a class="dropdown-item text-center small text-gray-500" href="<?= Url::toRoute(['//notifica/index']) ?>">Tutte le notifiche</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= \Yii::$app->user->identity->username ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= \Yii::getAlias('@web/images/undraw_profile.svg') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Esci
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!--
                    <?= Breadcrumbs::widget([
                    'options' => [
                        'class' => 'breadcrumb p-0 mb-0 mt-1 bg-none float-right',
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    -->

                    <div class="row justify-content-between mb-2">
                        <div class="col-5">
                        <h1 class="h5 text-gray-800"><?= Html::encode($this->title) ?></h1>
                        </div>
                        <div class="col-6">
                        <?= $this->render('//_parts/toolbar') ?>
                        </div>
                    </div>                    

                    <?= Alert::widget([
                        'options' => [
                            'class' => 'my-1',
                        ]
                    ]) ?>

                    <main class="pb-4">
                    <?= $content ?>
                    </main>

                    <button id="selectBtn" style="display:none;">SELEZIONA</button>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white p-2">
                <div class="copyright text-center my-auto">
                    Profility
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vuoi davvero uscire?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clicca "Esci" per terminare la sessione corrente.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulla</button>
                    <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Esci',
                        ['class' => 'btn btn-primary']
                    )
                    . Html::endForm() ?>
                </div>
            </div>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();