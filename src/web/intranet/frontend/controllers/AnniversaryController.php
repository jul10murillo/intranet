<?php

namespace frontend\controllers;

class AnniversaryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $users= \Edvlerblog\Adldap2\model\UserDbLdap::find()->select('username')->all();
       
       foreach ($users as $row){
            if ($row->username != "lcamacho") {
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
