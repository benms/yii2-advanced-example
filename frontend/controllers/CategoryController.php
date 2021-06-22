<?php


namespace frontend\controllers;

use frontend\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        return 'Page category/index';
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $cat = Category::findOne($id);
        if (!$cat) {
            throw new NotFoundHttpException(sprintf('Category %s not found ', $id));
        }

        return $this->render('view', ['model' => $cat]);
    }
}