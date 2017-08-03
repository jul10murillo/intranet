<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsBusiness */

$this->title = 'Crear Noticias';
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-business-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items'=>$items,
    ]) ?>

</div>
