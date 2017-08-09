<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Link */

$this->title = 'Actualizar Enlace: ' . $model->link_id;
$this->params['breadcrumbs'][] = ['label' => 'Enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->link_id, 'url' => ['view', 'id' => $model->link_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
