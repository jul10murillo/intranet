<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "application_category".
 *
 * @property integer $categoryap_id
 * @property string $categoryap_name
 * @property string $categoryap_description
 *
 * @property Application[] $applications
 */
class ApplicationCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryap_name', 'categoryap_description'], 'required'],
            [['categoryap_name'], 'string', 'max' => 100],
            [['categoryap_description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryap_id' => 'ID',
            'categoryap_name' => 'Categoría',
            'categoryap_description' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['categoryap_id' => 'categoryap_id']);
    }
}
