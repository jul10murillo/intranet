<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
/**
 * Site controller
 */
class TestController extends Controller
{


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $un = 'jmurillo@dumit' ;
        $pw = '12345678' ;
        if (\Yii::$app->ad->auth()->attempt($un , $pw)) {
            echo 'User successfully authenticated' ;
        } else {
            echo 'User or Password wrong' ;
        }

        $user = \Yii::$app->ad->search()->findBy('sAMAccountname', "jmurillo");
        print_r($user);exit;
        return $this->render('index');
    }

}
