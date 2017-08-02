<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LinkCategory */

$this->title = 'Actualizar Categoría de enlace: ' . $model->categoryli_id;
$this->params['breadcrumbs'][] = ['label' => 'Categorías de enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categoryli_id, 'url' => ['view', 'id' => $model->categoryli_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="link-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
