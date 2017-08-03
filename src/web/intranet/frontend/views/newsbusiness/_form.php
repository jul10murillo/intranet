<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model common\models\NewsBusiness */
/* @var $form yii\widgets\ActiveForm */
$var = [ 1 => 'Activo', 0 => 'Inactivo'];
?>

<div class="news-business-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'nbusiness_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nbusiness_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->fileInput()?>

    <?= $form->field($model, 'nbusiness_date', [
      'template' => "<label class=''>{label}</label><div class=''>{input}</div>\n{hint}\n{error}"
    ])->widget(DatePicker::classname(),[
      'options' => ['placeholder' => 'Seleccione una fecha . . .'],
      'value' => date('Y-m-d'),
      'type' => DatePicker::TYPE_COMPONENT_APPEND,
      'readonly' => true,      
      'pluginOptions' => [
      'autoclose'=>true,
      'format' => 'yyyy-mm-dd',
//        'todayHighlight' => TRUE,
    ]
    ]);
    ?>

    <?= $form->field($model, 'categoryne_id')->dropDownList($items) ?>

    <?=$form->field($model, 'nbusiness_active')->dropDownList($var, ['prompt' => 'Seleccione' ])?>

    <!--<? = $form->field($model, 'nbusiness_active')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
