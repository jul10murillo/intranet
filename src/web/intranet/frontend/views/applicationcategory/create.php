<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApplicationCategory */

$this->title = 'Crear Categoría de Aplicación';
$this->params['breadcrumbs'][] = ['label' => 'Categorías de Aplicación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
