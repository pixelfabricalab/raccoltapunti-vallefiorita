<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
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
    <div id="wrapper" class="p-4">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

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


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
