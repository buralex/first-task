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
        'css/site.css',
    ];
    public $js = [

        'https://maps.googleapis.com/maps/api/js?key=AIzaSyCJFHPBLlPl-S5GW26uklCKy7SzHkkoc9w&libraries=places&language=en',
        'js/drivers.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
