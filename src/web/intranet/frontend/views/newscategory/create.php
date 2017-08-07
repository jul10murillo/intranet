<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsCategory */

$this->title = 'Crear categoría de Noticias';
$this->params['breadcrumbs'][] = ['label' => 'Categoría de Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
