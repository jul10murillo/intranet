<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_business".
 *
 * @property integer $nbusiness_id
 * @property string $nbusiness_title
 * @property string $nbusiness_description
 * @property string $nbusiness_image
 * @property string $nbusiness_date
 * @property integer $categoryne_id
 * @property integer $nbusiness_active
 *
 * @property NewsCategory $categoryne
 */
class NewsBusiness extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
    public static function tableName()
    {
        return 'news_business';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nbusiness_title', 'nbusiness_description', 'nbusiness_image', 'nbusiness_date', 'categoryne_id', 'nbusiness_active'], 'required'],
            [['nbusiness_description'], 'string'],
            [['nbusiness_date'], 'safe'],
            [['categoryne_id', 'nbusiness_active'], 'integer'],
            [['nbusiness_title'], 'string', 'max' => 200],
            [['file'], 'file'],
            [['nbusiness_image'], 'string', 'max' => 100],
            [['categoryne_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['categoryne_id' => 'categoryne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nbusiness_id' => 'ID',
            'nbusiness_title' => 'Título',
            'nbusiness_description' => 'Descripción',
//            'nbusiness_image' => 'Imagen',
            'file' => 'Imagen',
            'nbusiness_date' => 'Fecha Publicación',
            'categoryne_id' => 'Categoría',
            'nbusiness_active' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryne()
    {
        return $this->hasOne(NewsCategory::className(), ['categoryne_id' => 'categoryne_id']);
    }
}
