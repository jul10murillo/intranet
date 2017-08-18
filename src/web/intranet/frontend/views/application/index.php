<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aplicaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= (\Yii::$app->authManager->checkAccess(\Yii::$app->user->id, 'editAppCategory'))?\yii\helpers\Html::a('Categorías de aplicaciones', \yii\helpers\Url::to(['applicationcategory/index']), ['class'=>'btn btn-success']):""; ?>
    <p>
        <?= Html::a('Crear Aplicación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'application_id',
            'application_name',
            'application_description:ntext',
            'application_url:url',
            'categoryap.categoryap_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
