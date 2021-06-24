<?php

namespace api\controllers;

use yii\rest\ActiveController;

/**
 * Class CategoryController
 *
 * @package api\controllers
 */
class NewsController extends ActiveController
{

    public $modelClass = 'api\models\News';

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
                'collectionOptions' => ['GET', 'HEAD', 'OPTIONS'],
                'resourceOptions' => ['GET', 'HEAD', 'OPTIONS']
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
        ];
    }
}
