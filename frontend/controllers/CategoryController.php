<?php


namespace frontend\controllers;

use frontend\models\Category;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $title = 'You are on Category/Index page';

//        print_r(Category::find()->innerJoinWith('news')->all());
//        die(__METHOD__);
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->innerJoinWith('news'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', ['title' => $title, 'dataProvider' => $dataProvider]);
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
        $dataProvider = new ActiveDataProvider([
            'query' => $cat->getNews(),
            'pagination' => false
        ]);

        return $this->render('view', [
            'model' => $cat,
            'dataProvider' => $dataProvider
        ]);
    }
}