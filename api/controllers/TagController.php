<?php

namespace api\controllers;

use api\models\Tag;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

/**
 * Class CategoryController
 *
 * @package api\controllers
 */
class TagController extends Controller
{
    public function actionIndex()
    {
        /*return new ActiveDataProvider([
            'query' => Tag::find()
        ]);*/

        $filter = new ActiveDataFilter([
            'searchModel' => 'api\models\search\TagSearch'
        ]);

        $filterCondition = null;

        if ($filter->load(\Yii::$app->request->get())) {
            $filterCondition = $filter->build();

            if (false === $filterCondition) {
                return $filter;
            }
        }

        $query = Tag::find();
        if (!is_null($filterCondition)) {
            $query->andWhere($filterCondition);
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

    public function actions()
    {
        return [
            'options' => [
                'class' => 'yii\rest\OptionsAction',
                'collectionOptions' => ['GET', 'HEAD', 'OPTIONS'],
                'resourceOptions' => [],
            ],
        ];
    }
}
