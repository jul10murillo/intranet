<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property integer $categoryne_id
 * @property string $categoryne_name
 * @property string $categoryne_description
 *
 * @property News[] $news
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryne_name', 'categoryne_description'], 'required'],
            [['categoryne_name'], 'string', 'max' => 100],
            [['categoryne_description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryne_id' => 'Categoryne ID',
            'categoryne_name' => 'Categoryne Name',
            'categoryne_description' => 'Categoryne Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['categoryne_id' => 'categoryne_id']);
    }
}
