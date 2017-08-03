<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Crear Fuente de Noticias';
$this->params['breadcrumbs'][] = ['label' => 'Fuente de Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items'=>$items,
    ]) ?>

</div>
