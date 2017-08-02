<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NewsBusiness */

$this->title = $model->nbusiness_id;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-business-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->nbusiness_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->nbusiness_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nbusiness_id',
            'nbusiness_title',
            'nbusiness_description:ntext',
            'nbusiness_image',
            'nbusiness_date',
            'categoryne.categoryne_name',
            'nbusiness_active',
        ],
    ]) ?>

</div>
