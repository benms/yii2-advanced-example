<?php

use frontend\models\News;
use frontend\models\Tag;
use yii\helpers\Html;

/**
 * @var News $model
 */

echo Html::tag('h1', Html::encode($model->title));
//$desc = StringHelper::truncateWords($model->description, 20);
echo Html::a(
    Html::encode($model->category->title),
    ['category/view', 'id' => $model->category->id],
    ['class' => 'label label-success']
);

foreach ($model->getTags()->each() as $tag) {
    /**
     * @var Tag $tag
     */
    echo Html::a(
        $tag->title,
        ['tag/view', 'id' => $tag->id],
        ['class' => 'label label-default']
    );
}

echo Html::tag('div', \yii\helpers\HtmlPurifier::process($model->description));

echo Html::tag(
    'p',
    Html::a('Go back', ['news/index'], ['class' => 'btn btn-default']),
    ['class' => 'text-right']
);