<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = $model['titleNews'];
?>

<h2 class="title-login"> <?= $model['titleNews'] ?>
    <br>
    <small><?= $model['pubDate'] ?></small>
</h2>

<div class="mission-body">
    <?= Html::decode($model['description']) ?>
</div>

<?= Html::a('Atrás', Url::to(['news/rss']),['class'=>'btn btn-application btn-lg']) ?>
<?= Html::a('Ir a '.$model['title'], $model['link'],['class'=>'btn btn-application btn-lg pull-right','target'=>'_blank']) ?>