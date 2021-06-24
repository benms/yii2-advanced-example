<?php

use frontend\models\News;
use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var string $title
 * @var News $dataProvider
 */
echo Html::tag('h2', Html::encode($title));
//echo Html::a('Go to view page', ['news/view', 'id' => 1]);

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_news_item_short',
        'itemOptions' => ['tag' => null],
        'options' => ['class' => 'list-group'],
    ]);