<?php


use yii\web\View;
use yii\helpers\Html;
use yii\widgets\Menu;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
    <ul class="nav navmenu-nav">
        <li><span class="glyphicon glyphicon-home"></span> <span><a href="/index.php?r=business%2Fsearch&id=1">Grupo Dumit</a></span></li>
        <li><span class="glyphicon glyphicon-list-alt"></span> <span><a href="/index.php?r=application%2Fsearch">Aplicaciones</a></span></li>
        <li><span class="glyphicon glyphicon-link"></span> <span><a href="/index.php?r=link%2Fsearch">Enlaces</a></span></li>
        <li><span class="glyphicon glyphicon-gift"></span> <span><a href="/index.php?r=birthday%2Findex">Cumpleaños</a></span></li>
        <li><span class="glyphicon glyphicon-calendar"></span> <span><a href="/index.php?r=anniversary%2Findex">Aniversarios</a></span></li>
    </ul>
</div>

<div class="navbar navbar-default navbar-fixed-top">
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="/index.php" class="navbar-brand"></a>
    <p class="navbar-text ">
     <?php
        echo Menu::widget([
        'items' => [
        ['label' => 'Perfil', 'url' => '#','options'=>['class'=>'profile'],],
        ['label' => 'Cerrar Sesión('.Yii::$app->user->identity->username.')',
            'url' => ['/site/logout']],
         ],
        'options' => [
        'class' => 'navbar-nav nav',
        'id'=>'navbar-id',
        'style'=>'font-size: 16px;',
        'data-tag'=>'yii2-menu',
        ],
        'activeCssClass'=>'activeclass',
        ]);
      ?>      
        
    </p>
</div>

<?php

echo $this->render('chanceTemplate');

$this->registerCss(".navmenu { box-shadow:0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; }"
        . ".navbar{ box-shadow:0 1px 3px 0 rgba(0,0,0,.12), 0 1px 2px 0 rgba(0,0,0,.24)!important; }");
$this->registerJs(
    "$('.profile').click( function() { $('#w0').modal('toggle'); });",
    View::POS_READY,
    'my-button-handler'
);?>