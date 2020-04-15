<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'css/materialize.css',
        'css/style.css',
        'slick/slick.css',
        'slick/slick-theme.css',
        'fancybox/jquery.fancybox.css',
    ];
    public $js = [
        "js/materialize.js",
        "slick/slick.min.js",
        "js/init.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
