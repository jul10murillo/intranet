<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
//use yii\data\Pagination;
use yii\widgets\LinkPager;

?>
<div class="search">
    <?php $form = ActiveForm::begin(); ?>
        <div class="col-sm-10 col-xs-10">
        <?= Html::input('text','search',null,['placeholder'=>'  Buscar...'])?>
        </div>
        <div class="col-sm-2 col-xs-2">
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>') ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<br>
<br>
<?php if ($search) : ?>
<hgroup>
    <h2 class="searchhead">Resultado de la búsqueda: "<?= $search ?>"</h2>
    <h2 class="lead"><strong class="text-danger"><?= $count ?></strong> <?= ($count > 1) ? "resultados encontrados" : "resultado encontrado" ?> de la búsqueda de <strong class="text-danger"><?= $search ?></strong></h2>
</hgroup>
<br>
<?php endif ; ?>
<div>
    <div>
         <?php
         foreach ($model as $row){
        ?>
        <div class="application-title" >
            <?php 
            echo $row-> link_name;
            ?>       
        </div>
        <div class="mission-body">
            <p><br/>
            <?php 
            echo $row-> link_description;
            ?>
            </p>
        </div>
        <div class="btn-application">
            <a href="<?php echo $row-> url;?>" target="_blank">INICIAR</a>
            <hr>
        </div>
       <?php
          }  
       ?> 
       <br>
    </div>
    <div class="pagination-link-application">
    <?= LinkPager::widget([
        "pagination" => $pages,
    ]);
       (\Yii::$app->user->can('editLink'))?\yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', \yii\helpers\Url::to(['link/index']), ['class'=>'botonF1']):"";
    ?>     
    </div>
    <?=
        (\Yii::$app->user->can('editLink'))?\yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', \yii\helpers\Url::to(['link/index']), ['class'=>'botonF1']):"";
    ?>
</div>