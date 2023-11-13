<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css',
        'vendor/node_modules/@fortawesome/fontawesome-free/css/all.css',
        'vendor/node_modules/quill/dist/quill.snow.css',
        'css/sb-admin-2.css',
        'css/site.css',
    ];
    public $js = [
        ['vendor/node_modules/quill/dist/quill.min.js', 'position' => \yii\web\View::POS_HEAD],
        ['js/mark.min.js', 'position' => \yii\web\View::POS_HEAD],
        ['js/core.js', 'position' => \yii\web\View::POS_END],
        ['js/sb-admin-2.js', 'position' => \yii\web\View::POS_END],
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
