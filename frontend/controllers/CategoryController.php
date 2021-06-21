<?php


namespace frontend\controllers;


use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        return 'Page category/index';
    }

    public function actionView($id)
    {
        return 'Single category view page '.$id;
    }
}