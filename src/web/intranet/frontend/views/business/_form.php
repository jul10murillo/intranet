<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Business */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'business_rif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mission_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'view_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
