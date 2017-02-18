<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masters */

$this->title = 'Update Masters: ' . $model->PK_Masters;
$this->params['breadcrumbs'][] = ['label' => 'Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PK_Masters, 'url' => ['view', 'id' => $model->PK_Masters]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
