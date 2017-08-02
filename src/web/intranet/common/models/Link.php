<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $link_id
 * @property string $link_name
 * @property string $link_description
 * @property string $url
 * @property integer $categoryli_id
 *
 * @property LinkCategory $categoryli
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_name', 'link_description', 'url', 'categoryli_id'], 'required'],
            [['link_description'], 'string'],
            [['categoryli_id'], 'integer'],
            [['link_name', 'url'], 'string', 'max' => 200],
            [['categoryli_id'], 'exist', 'skipOnError' => true, 'targetClass' => LinkCategory::className(), 'targetAttribute' => ['categoryli_id' => 'categoryli_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'link_id' => 'ID',
            'link_name' => 'Nombre',
            'link_description' => 'Descripción',
            'url' => 'Url',
            'categoryli_id' => 'Categoría',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryli()
    {
        return $this->hasOne(LinkCategory::className(), ['categoryli_id' => 'categoryli_id']);
    }
}
