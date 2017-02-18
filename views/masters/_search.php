<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MastersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masters-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PK_Masters') ?>

    <?= $form->field($model, 'MasterName') ?>

    <?= $form->field($model, 'MasterAddress') ?>

    <?= $form->field($model, 'MasterPhone') ?>

    <?= $form->field($model, 'MasterDesq') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
