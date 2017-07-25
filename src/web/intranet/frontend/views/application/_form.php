<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'application_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'application_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryap_id')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
