<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LinkCategory */

$this->title = $model->categoryli_id;
$this->params['breadcrumbs'][] = ['label' => 'Categorías de Enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->categoryli_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->categoryli_id], [
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
            'categoryli_id',
            'categoryli_name',
            'categoryli_description',
        ],
    ]) ?>

</div>
