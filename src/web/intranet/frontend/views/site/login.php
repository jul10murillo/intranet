<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="row">
    	<div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
            <?=
            \yii\bootstrap\Html::img('@web/img/img-dumit/black/LOGO.png',['class'=>'img-responsive login-img'])
            ?>
        </div>
        <div class="col-lg-6 col-md-6">
        <div class="title-login">
            <h1>INTRANET<br/>GRUPO DUMIT</h1>
        </div>
            <div class="login-dumit" >
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                ]); 
            ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'form-control']) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                 <div class="form-group text-center">
                    <?= Html::submitButton('ENTRAR', ['class' => 'btn btn-raised btn-primary btn-lg', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerJs(
    "$.material.init()",
    View::POS_READY,
    'my-button-handler'
);
?>