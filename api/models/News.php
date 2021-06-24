<?php

namespace api\models;

use Yii;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property int $enabled
 *
 * @property Category $category
 */
class News extends \yii\db\ActiveRecord implements Linkable
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    public function rules()
    {
        return parent::rules();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function fields()
    {
        return [
            'id',
            'category_id',
            'slug',
            'title',
            'enabled' => function () {
                return Yii::$app->formatter->asBoolean($this->enabled);
            }
        ];
    }

    public function extraFields()
    {
        return [
            'description',
            'category'
        ];
    }

    public function getLinks()
    {
        return [
            'self' => Url::to(['news/view', 'id' => $this->id], true),
            'category' => Url::to(['category/view', 'id' => $this->category_id], true),
        ];
    }
}