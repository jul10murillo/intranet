<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Actualizar fuente de Noticias: ' . $model->news_id;
$this->params['breadcrumbs'][] = ['label' => 'Fuentes de Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->news_id, 'url' => ['view', 'id' => $model->news_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' =>$items,
    ]) ?>

</div>
