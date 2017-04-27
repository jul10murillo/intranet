<?php


use yii\web\View;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="pull-left">
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Profile</a></li>
                <li role="presentation"><a href="#">Messages</a></li>
            </ul>
        </section>
    </aside>
</div>
<div class="pull-left">
    <div class="button-sidebar">
        <a class="btn btn-primary" id="toggle-sidebar" href="#" role="button"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
    </div>
</div>
<?php
$this->registerJs(
    '$( "#toggle-sidebar" ).click(function() {
        $( "aside" ).toggle( "slow" );
    });',
    View::POS_READY,
    'my-button-handler'
);
?>