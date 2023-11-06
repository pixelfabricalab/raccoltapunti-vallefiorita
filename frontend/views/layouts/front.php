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
        'innerContainerOptions' => ['class' => 'container-fluid'],
        'brandLabel' => '<img src="'. Yii::$app->homeUrl . 'assets/logo/profility-new.png" />',
        'brandUrl' => Yii::$app->homeUrl,
        'togglerContent' => '<i class="fa-solid fa-bars mobile-menu-toggler"></i>',
        'collapseOptions' => ['class'=>'justify-content-end'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-white bg-white fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'HOME', 'url' => ['/site/index'], 'class' =>'mx-2'],
        ['label' => 'SERVIZI', 'url' => ['/site/servizi']],
        ['label' => 'REGOLAMENTO', 'url' => ['/site/regolamento']],
        // ['label' => 'Premi', 'url' => ['/site/premi']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ACCEDI', 'url' => ['/site/login'], 'options' =>['class' => 'bg-login']];
    } else {
        $menuItems[] = ['label' => 'IL TUO ACCOUNT', 'url' => ['/dashboard'], 'options' => ['class' => 'radius bg-primary text-light']];
        /*
        $menuItems[] = '<li>'
            . Html::beginForm(
                ['/site/logout'], 'post', ['class' => 'form-inline']
                )
            . Html::submitButton(
                'Esci',
                ['class' => 'btn btn-link text-danger logout']
            )
            . Html::endForm()
            . '</li>';
        */
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <?= Alert::widget() ?>
                </div>
            </div>
        </div>

        <?= $content ?>

</main>

<footer class="footer mt-auto py-3 text-muted mt-3">
    <div class="container-fluid">
        <div class="row">
            <p class="text-center"><small>&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?> Tutti i diritti riservati.</small></p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();