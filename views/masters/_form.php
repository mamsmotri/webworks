<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Masters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PK_Masters')->textInput() ?>

    <?= $form->field($model, 'MasterName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MasterAddress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MasterPhone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MasterDesq')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
