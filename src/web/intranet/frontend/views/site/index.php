<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Intranet Grupo Dumit, C.A.';
?>
<div class="site-index">

        <div class="body-content">
            <div class="search">
                <?php $form = ActiveForm::begin(['action' => ['news/search']]); ?>
                    <?= Html::input('text','search',null,['placeholder'=>'  Buscar...'])?>
                    <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>') ?>
                <?php ActiveForm::end(); ?>

                <br><br>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=newsbusiness%2Fshow&id=2'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> RECURSOS HUMANOS</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=newsbusiness%2Fshow&id=3'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> INTERÉS</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=news%2Fshow'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> TECNOLOGÍA</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=newsbusiness%2Fshow&id=4'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> REDES</span></button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    <!--</div>-->
</div>
