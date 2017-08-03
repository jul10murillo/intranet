<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $news_id
 * @property string $news_channel
 * @property string $news_title
 * @property string $news_link
 * @property string $news_description
 * @property integer $categoryne_id
 *
 * @property NewsCategory $categoryne
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_channel', 'news_title', 'news_link', 'news_description', 'categoryne_id'], 'required'],
            [['news_description'], 'string'],
            [['categoryne_id'], 'integer'],
            [['news_channel', 'news_title', 'news_link'], 'string', 'max' => 200],
            [['categoryne_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['categoryne_id' => 'categoryne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'ID',
            'news_channel' => 'Canal',
            'news_title' => 'Título',
            'news_link' => 'Url',
            'news_description' => 'Descripción',
            'categoryne_id' => 'Categoría',
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
