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
                <?php $form = ActiveForm::begin(['action' => ['news/search'],'options' => [
                'class' => 'form-inline'
             ]]); ?>
                    <!--<div class="col-sm-10 col-xs-10">-->
                        <?= Html::input('text','search',null,['placeholder'=>'  Buscar...'])?>
                    <!--</div>-->
                    <!--<div class="col-sm-2 col-xs-2">-->
                        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>') ?>
                    <!--</div>-->
                    
                <?php ActiveForm::end(); ?>
                </div>
                <br><br>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=newsbusiness%2Fshow&id=2'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> RECURSOS HUMANOS</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=newsbusiness%2Fshow&id=3'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> INTERÉS</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-default" onClick="location.href = '/index.php?r=news%2Fshow'"><span class="glyphicon glyphicon-play"></span><span class="home-title"> TECNOLOGÍA</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
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
