<?php
use yii\helpers\Html;
use common\components\GDhelper;
//use yii\web\View;
//use yii\widgets\Menu;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
   <div>
    <ul class="nav navmenu-nav">
        <li><span class="glyphicon glyphicon-home"></span> <span><a href="/index.php?r=business%2Fsearch&id=1">Grupo Dumit</a></span></li>
        <li><span class="glyphicon glyphicon-list-alt"></span> <span><a href="/index.php?r=application%2Fsearch">Aplicaciones</a></span></li>
        <li><span class="glyphicon glyphicon-link"></span> <span><a href="/index.php?r=link%2Fsearch">Enlaces</a></span></li>
        <li><span class="glyphicon glyphicon-calendar"></span> <span><a href="<?= yii\helpers\Url::to(['/anniversary/date']) ?>">Fechas</a></span></li>
        
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
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Perfil</button>-->
     <?php
//        echo Menu::widget([
//        'items' => [
//        ['label' => 'Perfil ('.Yii::$app->user->identity->username.')',
//            'options'=>['class'=>'dropdown'],
////            'template' => '<a href="{url}" class="href_class">{label}</a>',
//            'template' => '<a href="#" class="href_class">{label}</a>',
//            'items' => [
//                ['label' => 'Modificar',
////                  'url' => ['#'],
//                 'options'=>['class'=>'','data-toggle'=>'modal','data-target'=>'#templateModal','data-whatever'=>'@getbootstrap'],
//                ],
//                ['label' => 'Cerrar Sesión',
//                 'url' => ['/site/logout']
//                ],
//             ],
//        ],
////        ['label' => 'Cerrar Sesión('.Yii::$app->user->identity->username.')',
////         'url' => ['/site/logout'],
////        ],
//        ],
//        'options' => [
//       'class' => 'navbar-nav nav',
////        'id'=>'navbar-id',
//        'style'=>'font-size: 14px;',
//////        'data-tag'=>'yii2-menu',
//        ],
////        'activeCssClass'=>'activeclass',
////          'submenuTemplate' => "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n",
//        ]);
        
       ?>
<div class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Perfil<?php echo ' ('.Yii::$app->user->identity->username.')'?> <b class="caret"></b></a>
    <?php
        echo Dropdown::widget([
            'options' => ['class' => ''],
            'items' => [
                ['label' => 'Modificar',
                 'url' => '#',
                'options'=>['class'=>'','data-toggle'=>'modal','data-target'=>'#templateModal','data-whatever'=>'@getbootstrap'],
                 ],
                ['label' => 'Cerrar Sesión',
                 'url' => ['/site/logout']
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <?=Html::submitButton("<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>",
                    ['class'=>'kv-action-btn',
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
