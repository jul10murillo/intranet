<?php
use yii\widgets\ListView;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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