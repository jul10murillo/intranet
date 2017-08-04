<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LinkCategory */

$this->title = 'Crear Categoría de Enlace';
$this->params['breadcrumbs'][] = ['label' => 'Categorías de Enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
