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
        
        <div class="col-lg-offset-8 col-lg-4 col-md-offset-8 col-md-4">
            <div class="well bs-component">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                ]); 
            ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'form-control']) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?php // $form->field($model, 'rememberMe')->checkbox() ?>

<!--                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>-->

                <div class="form-group text-center">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-raised btn-primary btn-lg', 'name' => 'login-button']) ?>
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