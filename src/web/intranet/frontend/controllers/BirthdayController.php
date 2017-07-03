<?php

namespace frontend\controllers;

class BirthdayController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $users= \Edvlerblog\Adldap2\model\UserDbLdap::find()->select('username')->all();
       
       foreach ($users as $row){
            $statususer= \common\models\User::find()->select('status')-> where(['username' => $row->username])->one();
//           if ($row->username != "lcamacho") {
            $accountStatus = $statususer->getAttribute("status",0);
//            print_r($accountStatus);exit;
            if ($accountStatus != 0) {
                $usersActive[] = \Yii::$app->ad->getDefaultProvider()->search()->findBy('sAMAccountname', $row->username);
            }
       } 
//       unset($usersActive[2]);
//       print_r(count($usersActive));exit;
//       print_r($usersActive[]->getFirstName());exit;
       return $this->render('index',[
                'usersActive' => $usersActive,
        ]);
    }

}
