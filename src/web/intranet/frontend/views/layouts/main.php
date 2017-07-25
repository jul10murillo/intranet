<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

if (!Yii::$app->user->isGuest) {
$cssfile= ('css/'.Yii::$app->user->identity->template);
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
    
</head>
<body class="bg">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    if (!Yii::$app->user->isGuest) {
//        NavBar::begin([
//            'brandLabel' => 'Grupo Dumit',
//            'brandUrl' => Yii::$app->homeUrl,
//            'options' => [
//                'class' => 'navbar navbar-custom navbar-fixed-top',
//            ],
//        ]);
//        $menuItems = [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//        ];
//        if (Yii::$app->user->isGuest) {
//            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//        } else {
//            $menuItems[] = '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn logout']
//                )
//                . Html::endForm()
//                . '</li>';
//        }
//        echo Nav::widget([
//            'options' => ['class' => 'navbar-nav navbar-right'],
//            'items' => $menuItems,
//        ]);
//        NavBar::end();
    }
    ?>
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

<!--            <p class="pull-right"><?= Yii::powered() ?></p>-->
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
