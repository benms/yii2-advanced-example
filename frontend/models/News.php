<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getTagToNews()
    {
        return $this->hasOne(TagToNews::class, ['news_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id'])->via('tagToNews');
    }
}