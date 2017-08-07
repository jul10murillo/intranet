<?php
namespace common\components;

use Yii;

class GDhelper{
    
    /**
     * Return Username
     * @return string
     */
//    private $_model;
    
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
    /**
     * Return Template
     * @return string
     */
    public static function getTemplate() {
//        $identity = Yii::$app->user->getIdentity();
        $model= new \common\models\UserProfile;
        $identity=$model::find()-> where(['id'=>Yii::$app->user->identity->id])->one();
        return $identity['template'];
    }
}