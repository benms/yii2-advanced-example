<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 *
 * @property TagToNews[] $tagToNews
 * @property News[] $news
 */
class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tag}}';
    }

    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::class, ['tag_id' => 'id']);
    }

    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->via('tagToNews');
    }
}