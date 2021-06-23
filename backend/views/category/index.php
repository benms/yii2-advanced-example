<?php

use backend\models\search\NewsSearch;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel NewsSearch */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php echo Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>

    </p>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'slug',
            'title',
            'enabled:boolean',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>


</div>
