<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías de Aplicación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categoría de Aplicación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'categoryap_id',
            'categoryap_name',
            'categoryap_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
