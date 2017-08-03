<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property integer $application_id
 * @property string $application_name
 * @property string $application_description
 * @property string $application_url
 * @property integer $categoryap_id
 *
 * @property ApplicationCategory $categoryap
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application_name', 'application_description', 'application_url', 'categoryap_id'], 'required'],
            [['application_description'], 'string'],
            [['categoryap_id'], 'integer'],
            [['application_name', 'application_url'], 'string', 'max' => 200],
            [['categoryap_id'], 'exist', 'skipOnError' => true, 'targetClass' => ApplicationCategory::className(), 'targetAttribute' => ['categoryap_id' => 'categoryap_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'application_id' => 'ID',
            'application_name' => 'Nombre',
            'application_description' => 'Descripción',
            'application_url' => 'Url',
            'categoryap_id' => 'Categoría',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryap()
    {
        return $this->hasOne(ApplicationCategory::className(), ['categoryap_id' => 'categoryap_id']);
    }
}
