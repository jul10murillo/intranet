<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "business".
 *
 * @property integer $business_id
 * @property string $business_rif
 * @property string $business_name
 * @property string $mission_description
 * @property string $view_description
 */
class Business extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_rif', 'business_name', 'mission_description', 'view_description'], 'required'],
            [['mission_description', 'view_description'], 'string'],
            [['business_rif'], 'string', 'max' => 30],
            [['business_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'business_id' => 'ID',
            'business_rif' => 'Rif',
            'business_name' => 'Nombre',
            'mission_description' => 'Misión',
            'view_description' => 'Visión',
        ];
    }
}
