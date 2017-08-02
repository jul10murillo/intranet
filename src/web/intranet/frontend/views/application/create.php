<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Application */

$this->title = 'Crear Aplicación';
$this->params['breadcrumbs'][] = ['label' => 'Aplicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items'=> $items,
    ]) ?>

</div>
