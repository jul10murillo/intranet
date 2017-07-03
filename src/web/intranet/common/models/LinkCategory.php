<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "link_category".
 *
 * @property integer $categoryli_id
 * @property string $categoryli_name
 * @property string $categoryli_description
 *
 * @property Link[] $links
 */
class LinkCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryli_name', 'categoryli_description'], 'required'],
            [['categoryli_name'], 'string', 'max' => 100],
            [['categoryli_description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryli_id' => 'ID',
            'categoryli_name' => 'Categoría',
            'categoryli_description' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinks()
    {
        return $this->hasMany(Link::className(), ['categoryli_id' => 'categoryli_id']);
    }
}
