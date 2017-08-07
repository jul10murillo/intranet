<?php
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="pull-right">
    <h4 >Filtrar noticias</h4>
    <?php $form = ActiveForm::begin();?>
        <?= Html::dropDownList('source', $select, $items); ?>
        <?= Html::submitButton('<span class="glyphicon glyphicon-search icon-search"></span>',['class'=>'button-search']); ?>
    <?php ActiveForm::end(); ?>
</div>
<h2 class="title-login">NOTICIAS</h2>

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