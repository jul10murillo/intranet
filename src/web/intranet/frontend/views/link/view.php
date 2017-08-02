<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Link */

$this->title = $model->link_id;
$this->params['breadcrumbs'][] = ['label' => 'Enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->link_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->link_id], [
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
            'link_id',
            'link_name',
            'link_description:ntext',
            'url:url',
            'categoryli.categoryli_name',
        ],
    ]) ?>

</div>
