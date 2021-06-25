<?php

namespace backend\models;

use yii\behaviors\SluggableBehavior;
use \common\models\Category as BaseCategory;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property bool $enabled
 *
 * @property News[]|null $news
 */
class Category extends BaseCategory
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enabled'], 'default', 'value' => false],
            [['title'], 'required'],
            [['enabled'], 'boolean'],
            [['slug', 'title'], 'string', 'max' => 256],
            [['slug'], 'unique'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'enabled' => 'Enabled',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['category_id' => 'id']);
    }
}
