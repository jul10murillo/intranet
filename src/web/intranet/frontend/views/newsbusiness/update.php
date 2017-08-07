<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsBusiness */

$this->title = 'Actualizar Noticias: ' . $model->nbusiness_id;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nbusiness_id, 'url' => ['view', 'id' => $model->nbusiness_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="news-business-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' =>$items,
    ]) ?>

</div>
