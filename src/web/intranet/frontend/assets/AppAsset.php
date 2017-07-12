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
        'css/site.css',
//        'css/bootstrap-material-design.css',
//        'css/ripples.css',
//        'css/zmd.hierarchical-display.css',
        'css/jasny-bootstrap/css/jasny-bootstrap.css',
        'css/gdumit.css',
//        'css/whitestyle.css',
//        'css/blackstyle.css',
    ];
    public $js = [
        'js/material.min.js',
        'js/ripples.min.js',
        'js/bootstrap.js',
        'js/jquery.zmd.hierarchical-display.js',
        'js/jasny-bootstrap/js/jasny-bootstrap.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        
    ];
    
     //Define as neededcssMethod,Note the order in the final 
  public static function addCss($view, $cssfile) { 
    $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']); 
  } 
    
}
