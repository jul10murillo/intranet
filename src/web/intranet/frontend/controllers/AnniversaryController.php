<?php

namespace frontend\controllers;

use yii\data\Pagination;
use yii\helpers\Json ;
use yii\filters\AccessControl;

class AnniversaryController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['date','index','jsonanniversary','jsonbirthday'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['date','index','jsonanniversary','jsonbirthday'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ] ;
    }
    
    public function actionIndex()
    {
        $users= \Edvlerblog\Adldap2\model\UserDbLdap::find()->select('username')->all();
        
       foreach ($users as $row){
           $statususer= \common\models\User::find()->select('status')-> where(['username' => $row->username])->one();
           $accountStatus = $statususer->getAttribute("status",0);
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
    
    public function actionDate() {
        
        $months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre") ;
        $month  = $months[date('n') - 1] ;
        $year   = date('Y') ;

        $users = \Edvlerblog\Adldap2\model\UserDbLdap::find()->select('username')->all() ;
        $birthday   = [];
        $anniversary   = [];
        foreach ($users as $row) {
            $statususer    = \common\models\User::find()->select('status')->where(['username' => $row->username])->one() ;
            $accountStatus = $statususer->getAttribute("status", 0) ;
                        
            if ($accountStatus != 0)
            {
                $userData      = \Yii::$app->ad->getDefaultProvider()->search()->findBy('sAMAccountname', $row->username) ;
                if (isset($userData->getFinicio()[0])) {

                    $date       = strtotime(str_replace('/', '-', $userData->getFinicio()[0])) ;
                    $dateStart  = date("d-m", $date) ;
                    if (date("m",$date) == date("m")) {
                        $anniversary[] =  $userData->getFirstName() . ' ' . $userData->getLastName() . ' - ' . (string) $dateStart ;
                    }
                }

                if (isset($userData->getFnacimiento()[0])) {
                    $date          = strtotime(str_replace('/', '-', $userData->getFnacimiento()[0])) ;
                    $dateStart     = date("d-m", $date) ;
                    if (date("m",$date) == date("m")) {
                        $birthday[] =  $userData->getFirstName() . ' ' . $userData->getLastName() . ' - ' . (string) $dateStart ;
                    }
                    
                }
            }
        }
        $user            = \Yii::$app->user->identity->username ;
        $userData        = \Yii::$app->ad->getDefaultProvider()->search()->findBy('sAMAccountname', $user) ;
        $birthdayUser    = (isset($userData->getFnacimiento()[0])) ? $userData->getFnacimiento()[0] : "No tiene fecha" ;
        $anniversaryUser = (isset($userData->getFinicio()[0])) ? $userData->getFinicio()[0] : "No tiene fecha" ;

        return $this->render('date', [
                    'month'           => $month,
                    'year'            => $year,
                    'birthday'        => $birthday,
                    'anniversary'     => $anniversary,
                    'birthdayUser'    => $birthdayUser,
                    'anniversaryUser' => $anniversaryUser,
                ]) ;
    }

    public function actionJsonanniversary() {
        $users = \Edvlerblog\Adldap2\model\UserDbLdap::find()->select('username')->all() ;

        foreach ($users as $row) {
            $statususer    = \common\models\User::find()->select('status')->where(['username' => $row->username])->one() ;
            $accountStatus = $statususer->getAttribute("status", 0) ;
            if ($accountStatus != 0)
            {
                $userData      = \Yii::$app->ad->getDefaultProvider()->search()->findBy('sAMAccountname', $row->username) ;
                if (isset($userData->getFinicio()[0]))
                {
                    
                    $date          = strtotime(str_replace('/', '-', $userData->getFinicio()[0])) ;
                    $dateDay       = strtotime("+1 day", $date) ;
                    $dateInicio    = date("m-d", $dateDay) ;
                    $dateYear      = date("Y") ;
                    $usersActive[] = [
                        'start' => (string)$dateInicio.'-'.$dateYear,
                        'title' => $userData->getFirstName().' '.$userData->getLastName(),
                        'description' => 'Aniversario de '.$userData->getFirstName().' '.$userData->getLastName(),
                        'color' => 'brown!important',
                        'allDay' => true
                    ] ;
                }
                
                if (isset($userData->getFnacimiento()[0]))
                {
                    $date          = strtotime(str_replace('/', '-', $userData->getFnacimiento()[0])) ;
                    $dateDay       = strtotime("+1 day", $date) ;
                    $dateInicio    = date("m-d", $dateDay) ;
                    $dateYear      = date("Y") ;
                    $usersActive[] = [
                        'start' => (string)$dateInicio.'-'.$dateYear,
                        'title' => $userData->getFirstName().' '.$userData->getLastName(),
                        'description' => 'Cumpleaños de '.$userData->getFirstName().' '.$userData->getLastName(),
                        'color' => 'blueviolet!important',
                        'allDay' => true
                    ] ;
                }
                
            }
        } 
        
        return \yii\helpers\Json::encode($usersActive);
    }
    
    public function actionJsonbirthday() {
        $user          = \Yii::$app->user->identity->username ;
        $userData      = \Yii::$app->ad->getDefaultProvider()->search()->findBy('sAMAccountname', $user) ;
        $statususer    = \common\models\User::find()->select('status')->where(['username' => $user])->one() ;
        $accountStatus = $statususer->getAttribute("status", 0) ;
        
        if ($accountStatus != 0)
        {
            $dataBirthday = $userData->getFnacimiento()[0] ;
            $dataStart    = $userData->getFinicio()[0] ;
            $cookiebirthday = \Yii::$app->getRequest()->getCookies()->getValue('birthday');
            if (isset($dataBirthday) && $cookiebirthday != true) {
                $date  = strtotime(str_replace('/', '-', $dataBirthday)) ;
                $birthday = date("m-d", $date) ;
                if ($birthday == date("m-d")) {
                    $result['bday']['status'] = true ;
                    
                    $cookie = new \yii\web\Cookie([
                        'name'   => 'birthday',
                        'value'  => true,
                        'expire' => time() + 31536000000,
                    ]) ;
                    \Yii::$app->getResponse()->getCookies()->add($cookie) ;
                    
                }else{
                    $result['bday']['status'] = false ;
                }
            }else{
                $result['bday']['status'] = false ;
            }
            $cookieanniversary = \Yii::$app->getRequest()->getCookies()->getValue('anniversary');
            if (isset($dataStart) && $cookieanniversary != true) {
                $date  = strtotime(str_replace('/', '-', $dataStart)) ;
                $startDay = date("m-d", $date) ;
                if ($startDay == date("m-d")) {
                    $start = date("d-m-Y", $date) ;
                    $date1 = new \DateTime($start);
                    $date2 = new \DateTime(date("Y-m-d"));
                    $interval = $date1->diff($date2);
                    $result['aday']['status'] = true ;
                    $result['aday']['description'] = $interval ;
                    
                    $cookie = new \yii\web\Cookie([
                        'name'   => 'anniversary',
                        'value'  => true,
                        'expire' => time() + 31536000000,
                    ]) ;
                    \Yii::$app->getResponse()->getCookies()->add($cookie) ;
                    
                    
                }else{
                    $result['aday']['status'] = false ;
                }
            }else{
                $result['aday']['status'] = false ;
            }
        }
        
        return Json::encode($result);
    }

}
