<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crear Noticias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-business-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Noticias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nbusiness_id',
            'nbusiness_title',
            'nbusiness_description:ntext',
            ['attribute'=>'Imagen',
             'value'=>'nbusiness_image',
             'format' => ['image',['width'=>'30','height'=>'30']]],
            'nbusiness_date',
            // 'categoryne_id',
            // 'nbusiness_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
