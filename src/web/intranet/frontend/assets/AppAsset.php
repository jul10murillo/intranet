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
//        'css/bootstrap-material-design.min.css',
//        'css/ripples.css',
//        'css/zmd.hierarchical-display.css',
        'css/jasny-bootstrap/css/jasny-bootstrap.css',
        'css/tooltip/jquery.qtip.min.css',
        'css/gdumit.css',
        'css/blackstyle.css',
        'css/fullcalendar.css',
        'css/alert/sweetalert.css',
        'css/easy-sidebar.css',
        'css/helperStyle.css',
    ];
    public $js = [
        'js/material.min.js',
        'js/ripples.min.js',
//        'js/bootstrap.js',
        'js/jquery.zmd.hierarchical-display.js',
        'js/jasny-bootstrap/js/jasny-bootstrap.js',
        'js/lib/moment.min.js',
        'js/fullcalendar.js',
        'js/es.js',
        'js/jquery.qtip.min.js',
        'js/alert/sweetalert-dev.js',
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
