<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tag}}';
    }

    public function getTagToNews()
    {
        return $this->hasOne(TagToNews::class, ['tag_id' => 'id']);
    }

    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id'])->via('tagToNews');
    }
}