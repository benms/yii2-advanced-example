<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">

    <?php echo Html::a(Yii::t('app', 'Create Tag'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>

    </p>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'slug',
            'title',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ],
        ],
    ]); ?>


</div>
