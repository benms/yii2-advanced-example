<?php

use frontend\models\News;
use yii\helpers\Html;
use yii\helpers\StringHelper;

/**
 * @var News $model
 */

$desc = StringHelper::truncateWords($model->description, 20);
echo Html::a(
    Html::encode($model->title).Html::tag('br').Html::tag('small', Html::encode($desc), ['class' => 'text-muted']),
    ['news/view', 'id' => $model->id],
    ['class' => 'list-group-item']
);