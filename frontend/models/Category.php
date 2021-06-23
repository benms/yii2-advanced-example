<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Category
 * @package frontend\models
 * @property News[]|null $news
 */
class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [];
    }

    /**
     * @return ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['category_id' => 'id']);
    }
}