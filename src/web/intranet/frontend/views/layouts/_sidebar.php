<?php
use yii\helpers\Html;
use common\components\GDhelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;
use yii\helpers\Url;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
   <div class="menu-principal">
    <ul class="nav navmenu-nav">
        <li><span class="glyphicon glyphicon-home"></span> <span><a href="/index.php?r=business%2Fsearch&id=1">Grupo Dumit</a></span></li>
        <li><span class="glyphicon glyphicon-list-alt"></span> <span><a href="/index.php?r=application%2Fsearch">Aplicaciones</a></span></li>
        <li><span class="glyphicon glyphicon-link"></span> <span><a href="/index.php?r=link%2Fsearch">Enlaces</a></span></li>
        <li><span class="glyphicon glyphicon-calendar"></span> <span><a href="<?= yii\helpers\Url::to(['/anniversary/date']) ?>">Calendario</a></span></li>
        <li class="hidden-lg hidden-md">
            <a data-toggle="dropdown" href="#" class="profile"><span class="glyphicon glyphicon-user"></span> Perfil (<?= Yii::$app->user->identity->username ?>)
            <ul class="dropdown-menu nav navmenu-nav">
                <li  >
                    <a href="" class="label-dropdown" data-toggle="modal" data-target="#templateModal" >
                        <span class="glyphicon glyphicon-edit"></span>
                        Modificar
                    </a>
                </li>
                <li class="label-dropdown">
                    <a href="<?= Url::to(['/site/logout']) ?>" class="label-dropdown">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Cerrar Sesión
                    </a>
                </li>
            </ul>
        </li>
    </ul>
   </div>
</div>

<div class="navbar navbar-default navbar-fixed-top">
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="/index.php" class="navbar-brand"></a>
<div class="dropdown hidden-sm hidden-xs">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Perfil<?php echo ' ('.Yii::$app->user->identity->username.')'?> <b class="caret"></b></a>
    <?php
        echo Dropdown::widget([
            'options' => ['class' => 'drop-custom'],
            'items' => [
                ['label' => 'Modificar',
                 'url' => '#',
                'options'=>['class'=>'item-custom','data-toggle'=>'modal','data-target'=>'#templateModal','data-whatever'=>'@getbootstrap'],
                 ],
                ['label' => 'Cerrar Sesión',
                 'url' => ['/site/logout'],
                    'options'=>['class'=>'item-custom']
                ],
            ],
        ]);
    ?>
</div>
</div>
<div class="modal fade" id="templateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Perfil</h4>
      </div>
      <?php $form = ActiveForm::begin(['id'=>'template','action' => ['/site/update']]);?>
      <div class="modal-body">
        <?php
        echo('<b>Usuario:</b> '. GDhelper::getUsername().'<br><br>');
        echo('<h4>Seleccione un Diseño para la <b>Intranet</b>:</h4>');  
        ?>         
      <div class="form-group">
        <?=Html::dropDownList('listemplate', GDhelper::getTemplate(), ['whitestyle.css' => 'Estilo Claro','blackstyle.css' => 'Estilo Oscuro'],['prompt' => 'Seleccione','class' =>'form-control'])?>
      </div>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <?=Html::submitButton("<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>",
                    ['class'=>'modal-btn',
                     'onclick'=>"'".\Yii::$app->urlManager->createUrl(['/site/update'])."'",
                     'data-toggle'=>'tooltip',
                     'title'=>Yii::t('app', 'Editar perfil'),
                    ]
        )?>
      </div>
       <?php  ActiveForm::end(); ?>
    </div>
  </div>
</div>
<?php
$this->registerCss(".navmenu { box-shadow:0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; }"
        . ".navbar{ box-shadow:0 1px 3px 0 rgba(0,0,0,.12), 0 1px 2px 0 rgba(0,0,0,.24)!important; }");
?>
