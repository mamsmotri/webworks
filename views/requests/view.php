<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Requests */

$this->title = $model->PK_Requests;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-view">

    <h3>Номер заявки: <?= Html::encode($this->title) ?></h3>
    <?php if(Yii::$app->user->identity->hasRole('Driver') && Yii::$app->user->identity->getId() == $model->user_id): ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PK_Requests], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PK_Requests], [
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
            'PK_Requests',
            'Car:ntext',
            'user_id',
            'Phone:ntext',
            'Text:ntext',
        ],
    ]) ?>

</div>
