<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

<!--    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Recursos Humanos</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-primary']) ?>
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Interés</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-info']) ?>
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-info']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tecnología</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-warning']) ?>
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-warning']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Redes</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-danger']) ?>
                            <?= Html::a('Noticias', Url::to(['/news/index']),['class'=>'list-group-item text-center btn btn-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
