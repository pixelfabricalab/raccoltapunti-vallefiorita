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
        'css/sb-admin-2.css',
        'vendor/node_modules/@fortawesome/fontawesome-free/css/all.css',
        'css/site.css',
        'css/jquery.timepicker.min.css',
    ];
    public $js = [
        // ['js/react.development.js', 'position' => \yii\web\View::POS_END],
        // ['js/react-dom.development.js', 'position' => \yii\web\View::POS_END],
        // ['js/babel.min.js', 'position' => \yii\web\View::POS_END],
        
        // ['js/vue.global.js', 'position' => \yii\web\View::POS_END],

        ['js/d3.v7.min.js', 'position' => \yii\web\View::POS_HEAD],

        ['js/moment.min.js', 'position' => \yii\web\View::POS_END],

        ['js/timepicker.min.js', 'position' => \yii\web\View::POS_END],

        ['js/axios.min.js', 'position' => \yii\web\View::POS_HEAD],
        
        ['js/sb-admin-2.js', 'position' => \yii\web\View::POS_END],
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
