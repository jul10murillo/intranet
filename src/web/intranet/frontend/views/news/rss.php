<?php
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = "Noticias";
?>
<div class="pull-right">
    <div class="search">
        <h4 class="media-heading">Filtrar noticias</h4>
        <?php $form = ActiveForm::begin(['id' => 'login-form','method'=>'get','options' => [
                    'class' => 'form-inline'
                 ]]); ?>
            <?= Html::dropDownList('source', $select, $items,['class'=>'form-control']); ?>
            <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>') ?>
        <?php ActiveForm::end(); ?>       
    </div>    
</div>
<div class="application-title">NOTICIAS</div>
<?=
ListView::widget([
    'dataProvider' => $provider,
    'itemView' => '_post',
    'pager' => [
            'options' => [
                'class' => 'pagination text-center'
            ]
        ],
]);
?>