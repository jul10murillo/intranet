<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías de Enlaces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categoría de Enlace', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'categoryli_id',
            'categoryli_name',
            'categoryli_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
