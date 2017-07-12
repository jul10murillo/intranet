<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use common\components\GDhelper;

?>
<?php
Modal::begin([
    'header' => '<h2>Perfil</h2>',
//    'toggleButton' => ['label' => 'click me'],
]);
$form = ActiveForm::begin([
    'id' => 'update-form',
    'options' => ['class' => 'form-horizontal'],
]) 


?>

<!--<? = $form->field($model, 'username') ?>-->
<!--<? = $form->field($model, 'items[]')->checkboxList(['1' => 'Black', '2' => 'White']);?>-->

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Editar', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php
ActiveForm::end();
Modal::end();
?>