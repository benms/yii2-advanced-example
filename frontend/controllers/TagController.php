<?php


namespace frontend\controllers;


use yii\web\Controller;

class TagController extends Controller
{
    public function actionIndex()
    {
        return __METHOD__;
    }

    public function actionView($id)
    {
        return __METHOD__.' view page '.$id;
    }
}