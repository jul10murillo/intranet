<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ApplicationCategory */

$this->title = $model->categoryap_id;
$this->params['breadcrumbs'][] = ['label' => 'Categorías de Aplicación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->categoryap_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->categoryap_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro de que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'categoryap_id',
            'categoryap_name',
            'categoryap_description',
        ],
    ]) ?>

</div>
