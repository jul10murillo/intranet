<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías de Noticias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear categoría de Noticias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'categoryne_id',
            'categoryne_name',
            'categoryne_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
