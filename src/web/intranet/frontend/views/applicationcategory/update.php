<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApplicationCategory */

$this->title = 'Actualizar Categoría Aplicación: ' . $model->categoryap_id;
$this->params['breadcrumbs'][] = ['label' => 'Categorías de Aplicación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categoryap_id, 'url' => ['view', 'id' => $model->categoryap_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="application-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
