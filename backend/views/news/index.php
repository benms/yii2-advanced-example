<?php

use backend\models\search\NewsSearch;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel NewsSearch */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php echo Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>

    </p>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'category_id',
            'slug',
            'title',
            'description:ntext',
            //'enabled:boolean',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ],
        ],
    ]); ?>


</div>
