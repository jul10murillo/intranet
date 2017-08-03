<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsCategory */

$this->title = 'Actualizar Categoría de Noticia: ' . $model->categoryne_id;
$this->params['breadcrumbs'][] = ['label' => 'Categorías de Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categoryne_id, 'url' => ['view', 'id' => $model->categoryne_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="news-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
