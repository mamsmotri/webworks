<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MastersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masters-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Masters', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PK_Masters',
            'MasterName:ntext',
            'MasterAddress:ntext',
            'MasterPhone:ntext',
            'MasterDesq:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
