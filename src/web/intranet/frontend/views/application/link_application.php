<?php
//use yii\data\Pagination ;
use yii\widgets\LinkPager ;
use yii\widgets\ActiveForm ;
use yii\helpers\Html ;

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
    <h2 class="searchhead">Resultado de la búsqueda: "<?= $searchString ?>"</h2>
    <h2 class="lead"><strong class="text-danger"><?= $count ?></strong> <?= ($count > 1) ? "resultados encontrados" : "resultado encontrado" ?> de la búsqueda de <strong class="text-danger"><?= $searchString ?></strong></h2>
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
            <a href="<?php echo $row->application_url ; ?>" target="_blank">INICIAR
<!--                <form>
                    <input type="button" value="Iniciar" onClick="go();"/>
                    <input type="button" value="Iniciar" onClick="window.open('file:///C:/prueba/vcredist_x64.exe')"/>                    
                </form>-->
            </a>
            <hr>
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