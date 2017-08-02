<?php

use yii\data\Pagination ;
use yii\widgets\LinkPager ;
use yii\widgets\ActiveForm ;
use yii\helpers\Html ;

?>
<div class="search">
    <?php $form = ActiveForm::begin(); ?>
        <?= Html::input('text','search',null,['placeholder'=>'  Buscar...'])?>
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>') ?>
    <?php ActiveForm::end(); ?>
</div>
<br>
<?php if ($search) : ?>
<hgroup>
    <h2 class="searchhead">Resultado de la busqueda: "<?= $searchString ?>"</h2>
    <h2 class="lead"><strong class="text-danger"><?= $count ?></strong> <?= ($count > 1) ? "resultados encontrados" : "resultado encontrado" ?> de la busqueda de <strong class="text-danger"><?= $searchString ?></strong></h2>
</hgroup>
<br>
<?php endif ; ?>
<div>
    <div>
        <?php
        foreach ($model as $row) {
        ?>
        <div class="application-title" >
            <?php
            echo $row->application_name ;
            ?>
        </div>
        <div class="mission-body">
            <p></br>
                <?php
                echo $row->application_description ;
                ?>
            </p>
        </div>
        <div class="btn-application">
            <a href="<?php echo $row->application_url ; ?>" target="_blank">INICIAR</a> 
        </div>
        <?php
        }
        ?>
        <br>
    </div>
    <div class="pagination-link-application">
        <?=
        LinkPager::widget([
            "pagination" => $pages,
        ]) ;
        ?> 
    </div>
</div>