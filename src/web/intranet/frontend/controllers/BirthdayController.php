<?php

namespace frontend\controllers;

class BirthdayController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
       $users= \Edvlerblog\Adldap2\model\UserDbLdap::find()->all();
       foreach ($users as $row){
//             $usersActive= \Edvlerblog\Adldap2\model\UserDbLdap::findByUsername($row->username);
              $usersActive= \Edvlerblog\Adldap2\model\UserDbLdap::findByUsername($row->username);
              print_r($usersActive);
       } 
      
       return $this->render('index',[
                'usersActive' => $usersActive,
        ]);
    }

}
