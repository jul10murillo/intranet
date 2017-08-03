<?php

namespace frontend\controllers;


class UserController extends \yii\web\Controller
{
    public function actionSearch($user)
    {
        $users= \common\models\User::find()-> where(['username' => $user])->all();
        
        return $this->render('chanceTemplate',[
        'users' => $users
        ]);
    }

}