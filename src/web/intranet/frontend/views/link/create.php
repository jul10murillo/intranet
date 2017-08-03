<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Link */

$this->title = 'Crear Enlace';
$this->params['breadcrumbs'][] = ['label' => 'Enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items'=>$items,
    ]) ?>

</div>
