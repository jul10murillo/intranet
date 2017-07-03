<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApplicationCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryap_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryap_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
