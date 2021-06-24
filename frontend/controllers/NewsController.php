<?php


namespace frontend\controllers;


use frontend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->innerJoinWith('category')
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'title' => 'You are on news/index page'
        ]);
    }

    public function actionView($id)
    {
        $model = News::findOne($id);

        return $this->render('view', [
            'model' => $model,
            'title' => 'Single news view page'
        ]);
    }
}