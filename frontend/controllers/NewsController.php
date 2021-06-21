<?php


namespace frontend\controllers;


use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        return 'Page news/index';
    }

    public function actionView($id)
    {
        return 'Single news view page '.$id;
    }
}