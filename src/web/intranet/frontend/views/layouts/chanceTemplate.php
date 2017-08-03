<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use common\components\GDhelper;

?>
<div class="">
         <?php
            Modal::begin([
                'header' => '<h2>Perfil</h2>',              
            ]);

            echo('<b>Usuario:</b> '. GDhelper::getUsername().'<br><br>');
            echo('<h4>Seleccione un Diseño para la <b>Intranet</b>:</h4>'); 
        ?>
    <!--<? =Html::beginForm(\yii\helpers\Url::to(['/site/update']), 'post',['class' => 'form-horizontal'])?>-->
            <?=Html::beginForm(['update','id'=>'template'], 'post',['class' => 'form-horizontal'])?>
            <!--<? = Html::input('text', 'template', GDhelper::getTemplate()) ?>-->
            <?=Html::dropDownList('listemplate', GDhelper::getTemplate(), ['whitestyle.css' => 'Estilo Claro','blackstyle.css' => 'Estilo Oscuro'],['class' =>'form-control']) ?>
            <div class="form-group">
             <?= Html::submitButton('Editar',['id' => 'template','class' =>'btn btn-primary'])?>
            </div>

        <?php
        Html::endForm();
        Modal::end();
        ?>
</div>