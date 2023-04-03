<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use common\components\PixelNavBar;

AppAsset::register($this);
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
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header class="site-header sticky-top py-5">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="'. Yii::$app->homeUrl . 'assets/logo/profility-new.png" />',
        'brandUrl' => Yii::$app->homeUrl,
        'togglerContent' => '<i class="fa-solid fa-bars mobile-menu-toggler"></i>',
        'collapseOptions' => ['class'=>'justify-content-end'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-white bg-white fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'], 'class' =>'mx-2'],
        ['label' => 'Come funziona', 'url' => ['/site/regolamento']],
        ['label' => 'Servizi', 'url' => ['/site/servizi']],
        ['label' => 'Premi', 'url' => ['/site/premi']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'], 'options' =>['class' => 'bg-login']];
    } else {
        $menuItems[] = ['label' => 'Profilo', 'url' => ['/dashboard']];
        $menuItems[] = ['label' => 'Lista Scansioni', 'url' => ['/dashboard/scontrino/index']];
        $menuItems[] = ['label' => 'Carica Scontrino', 'url' => ['/dashboard/scontrino/create']];
        $menuItems[] = '<li>'
            . Html::beginForm(
                ['/site/logout'], 'post', ['class' => 'form-inline']
                )
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();