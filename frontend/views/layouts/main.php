<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Menu;
use yii\web\View;
use yii\helpers\Url;

AppAsset::register($this);
$this->registerJs("$('main input:not([type=\"checkbox\"]), main select, main textarea').addClass('form-control-sm');", View::POS_READY, 'input-small');
$this->registerJs("$('main button').addClass('btn-sm');", View::POS_READY, 'btn-small');
$this->registerJs("$('[data-toggle=\"tooltip\"]').tooltip();", View::POS_READY, 'tooltips');
$this->registerJs("const csrf_token = '" . Yii::$app->request->getCsrfToken() . "';", View::POS_HEAD, 'csrf');
$this->registerJs("const baseUrl = '" . Yii::getAlias('@web/') . "';", View::POS_HEAD, 'base-url');
$this->registerJs("const apiUrl = '" . Yii::getAlias('@web/api') . "';", View::POS_HEAD, 'api-url');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $randver = rand(1,45);?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-57x57.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-60x60.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-72x72.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-76x76.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-114x114.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-120x120.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-144x144.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-152x152.png?v=<?php echo $randver; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= \Yii::getAlias('@web') ?>/images/favicon/apple-icon-180x180.png?v=<?php echo $randver; ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= \Yii::getAlias('@web') ?>/images/favicon/android-icon-192x192.png?v=<?php echo $randver; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= \Yii::getAlias('@web') ?>/images/favicon/favicon-32x32.png?v=<?php echo $randver; ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= \Yii::getAlias('@web') ?>/images/favicon/favicon-96x96.png?v=<?php echo $randver; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= \Yii::getAlias('@web') ?>/images/favicon/favicon-16x16.png?v=<?php echo $randver; ?>">
    <link rel="manifest" href="<?= \Yii::getAlias('@web') ?>/images/favicon/manifest.json?v=<?php echo $randver; ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= \Yii::getAlias('@web') ?>/images/favicon/ms-icon-144x144.png?v=<?php echo $randver; ?>">
    <meta name="theme-color" content="#ffffff">

    <?php $this->head() ?>

    <style>
        body {
            font-size: 0.85rem;
        }
    </style>

    <script type="importmap">
    {
        "imports": {
        "vue": "https://unpkg.com/vue@3/dist/vue.esm-browser.js"
        }
    }
    </script>
    <script>
        const formatter = new Intl.NumberFormat('it-IT', {style: 'currency', currency: 'EUR'})
    </script>
</head>
<body class="d-flex flex-column h-100" id="page-top">
<?php $this->beginBody() ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->render('//_parts/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!--
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cerca&hellip;"
                                aria-label="Cerca" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <?php if (false) : ?>
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <?php endif; ?>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Avvisi
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">12 ottobre 20222</div>
                                        <span class="font-weight-bold">I tuoi punti valgono doppio!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">31 ottobre 20222</div>
                                        Entra in uno dei nostri store e guadagna 100 punti!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">25 dicembre 20222</div>
                                        È Natale! Ti regaliamo <strong>500 punti bonus</strong>!
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Leggi tutti</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= \Yii::$app->user->identity->username ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= \Yii::getAlias('@web/images/undraw_profile.svg') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= Url::to(['/dashboard/profilo/update', 'id' => \Yii::$app->user->identity->id]) ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profilo
                                </a>
                                <a class="dropdown-item" href="<?= Url::to(['/dashboard/report']) ?>">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Storico
                                </a>
                                <!--
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Impostazioni
                                </a>
                                -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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

                    <!-- Page Heading -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= Html::encode($this->title) ?></h1>

                        <?php if (!($this->context->id == 'coupon' && $this->context->action->id == 'validate')) : ?>
                        <a href="<?= Url::toRoute('//dashboard/scontrino/create') ?>" class="btn btn-sm btn-success shadow-sm" id="newScontrino"><i
                                class="fas fa-arrow-up fa-sm text-white-50"></i> Carica</a>
                        <?php endif; ?>
                    </div>

                    <?= Alert::widget([
                        'options' => [
                            'class' => 'my-1',
                        ]
                    ]) ?>

                    <main class="mb-4">
                    <?= $content ?>
                    </main>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <p><?= \Yii::$app->name ?></p>
                    </div>
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
