<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

if (!Yii::$app->user->isGuest) {
    $model= new \common\models\UserProfile;
    $user_profile=$model::find()->select(['template'])-> where(['id'=>Yii::$app->user->identity->id])->one();
    $template= $user_profile['template'];
    $cssfile= ('css/'. $template);
    //$cssfile= ('css/'.Yii::$app->user->identity->template);
}else{
    $cssfile= ('css/blackstyle.css');
}

AppAsset::register($this);
AppAsset::addCss($this,$cssfile);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/uploads/icon/logo_home_2HU_icon.ico')]); ?>
    <script type="text/javascript" LANGUAGE="JavaScript">
        function go() {
          w = new ActiveXObject("WScript.Shell");
          w.run("c:\\prueba\\vcredist_x64.exe");
       //   return true;
          }
    </script>
</head>
<body class="bg">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
        if (!Yii::$app->user->isGuest) {
    ?>
    
    <?= $this->render('_sidebar'); ?>
    
    <?php
        }
    ?>

    <div class="container">
        <?php
        if (!Yii::$app->user->isGuest) {
        echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ;
        }?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>
<?php
if (!Yii::$app->user->isGuest) {
    ?>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; GRUPO DUMIT <?= date('Y') ?></p>
<!--            <p class="pull-right"><? = Yii::powered() ?></p>-->
        </div>
    </footer>
    <?php
    
}
?>
    <?php
$this->registerCss("footer { -webkit-box-shadow: 0px -3px 5px 0px rgba(50, 50, 50, 0.75)!;
-moz-box-shadow:    0px -3px 5px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 0px 5px 0px rgba(50, 50, 50, 0.75); }");
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
