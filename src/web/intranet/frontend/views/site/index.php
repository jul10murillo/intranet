<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Intranet Grupo Dumit, C.A.';
?>
<div class="site-index">

<!--    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->
<!--    <div class="canvas canvas-slid" style="left:300px; right:-300px;">
        <div class="navbar navbar-default navbar-fixed-top" style="left: 300px;right: 1226px;">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
        </div>-->
        <div class="body-content">
            <div class="search">
                <form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
                    <input id="buscar" name="buscar" type="search" class="" placeholder="    Buscar...">
<!--                    <input type="submit" name="buscador" class="btn-search" value="buscar">                    -->
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
                <br><br>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="list-group">
                                
                            </div>
                        </div>
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-play"></span><span class="home-title"> RECURSOS HUMANOS</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="list-group">
                                
                            </div>
                        </div>
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-play"></span><span class="home-title"> INTERÉS</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-body">
                            <div class="list-group">
                            </div>
                        </div>
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=news%2Fshow'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> TECNOLOGÍA</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-danger">
                        <div class="panel-body">
                            <div class="list-group">
                            </div>
                        </div>
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-play"></span><span class="home-title"> REDES</span></button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    <!--</div>-->
</div>
