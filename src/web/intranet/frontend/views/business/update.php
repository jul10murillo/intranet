<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Business */

$this->title = 'Actualizar Empresa: ' . $model->business_id;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->business_id, 'url' => ['view', 'id' => $model->business_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="business-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
