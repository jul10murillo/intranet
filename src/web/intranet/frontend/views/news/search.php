<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Resultados búsqueda';
?>
<div class="search">
    <?php $form = ActiveForm::begin(['action' => ['news/search'],'options' => [
                'class' => 'form-inline'
             ]]); ?>
    <div class="col-sm-10 col-xs-10">   
        <?= Html::input('text','search',null,['placeholder'=>'  Buscar...'])?>
    </div>
    <div class="col-sm-2 col-xs-2">
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>') ?>
    </div>    
    <?php ActiveForm::end(); ?>
</div>
<hgroup>
    <h2 class="searchhead">Resultado de la búsqueda: "<?= $search ?>"</h2>
    <h2 class="lead"><strong class="text-danger"><?= $count ?></strong> <?= ($count > 1) ? "resultados encontrados" : "resultado encontrado" ?> de la búsqueda de <strong class="text-danger"><?= $search ?></strong></h2>
</hgroup>
<br>
<section class="col-xs-12 col-sm-6 col-md-12">
<?php
    foreach ($data as $value) :
?>
    <article class="search-result row">
        <div class="col-xs-12 col-sm-12 col-md-3">
                <a href="<?= \yii\helpers\Url::to(['/newsbusiness/detail','id'=> $value->nbusiness_id ])?>" title="<?= $value->nbusiness_title ?>" class="thumbnail"><img src="<?= $value->nbusiness_image ?>" alt="Lorem ipsum" /></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2">
                <ul class="meta-search">
                    <li><i class="glyphicon glyphicon-calendar"></i> <span><?= $value->nbusiness_date ?></span></li>
                </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                <h3><a href="<?= \yii\helpers\Url::to(['/newsbusiness/detail','id'=> $value->nbusiness_id ])?>" title="<?= $value->nbusiness_title ?>"><?= $value->nbusiness_title ?></a></h3>
                <?php if(strlen($value->nbusiness_description) <= 350) : ?>
                <p><?= $value->nbusiness_description ?></p>
                <?php else : ?>
                <p><?= substr($value->nbusiness_description,0,350).'...' ?></p>
                <?php endif ; ?>
                <span class="plus"><a href="<?= \yii\helpers\Url::to(['/newsbusiness/detail','id'=> $value->nbusiness_id ])?>" title="<?= $value->nbusiness_title ?>"><i class="glyphicon glyphicon-plus"></i></a></span>
        </div>
        <span class="clearfix borda"></span>
    </article>
<?php
    endforeach ;
?>
<?=
    LinkPager::widget([
        "pagination" => $pagination,
    ]) ;
?>
</section>