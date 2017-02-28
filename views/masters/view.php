<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masters */

$this->title = $model->PK_Masters;
$this->params['breadcrumbs'][] = ['label' => 'Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masters-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->identity->hasRole('Master') && Yii::$app->user->identity->getId() == $model->user_id): ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->PK_Masters], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->PK_Masters], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PK_Masters',
            'MasterName:ntext',
            'MasterAddress:ntext',
            'MasterPhone:ntext',
            'MasterDesq:ntext',
            'user_id',
        ],
    ]) ?>

</div>
