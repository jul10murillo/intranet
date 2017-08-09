<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'news_channel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'categoryne_id')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
