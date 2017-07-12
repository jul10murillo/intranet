<?php
namespace common\components;

use Yii;

class GDhelper{
    
    /**
     * Return Username
     * @return string
     */
    public static function getUsername() {
        $identity = Yii::$app->user->getIdentity();
        return $identity['username'];
    }
    
    /**
     * 
     * @return string
     */
    public static function getEmail() {
        $identity = Yii::$app->user->getIdentity();
        return $identity['email'];
    }
    
    public static function getUser() {
        $identity = Yii::$app->user->getIdentity();
        return $identity['email'];
    }    
    
}