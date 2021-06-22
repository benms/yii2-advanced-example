<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property bool $enabled
 *
 * @property Category $category
 * @property TagToNews[] $tagToNews
 * @property Tag[] $tags
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'default', 'value' => null],
            [['category_id'], 'integer'],
            [['slug', 'title', 'description'], 'required'],
            [['description'], 'string'],
            [['enabled'], 'boolean'],
            [['slug', 'title'], 'string', 'max' => 256],
            [['slug'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'description' => 'Description',
            'enabled' => 'Enabled',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[TagToNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagToNews()
    {
        return $this->hasMany(TagToNews::className(), ['news_id' => 'id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('tag_to_news', ['news_id' => 'id']);
    }
}
