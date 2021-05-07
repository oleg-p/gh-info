<?php

/* @var $this yii\web\View */
/* @var $model GhUser */

use yii\helpers\Html;
use app\models\GhUser;
use yii\bootstrap\ActiveForm;

?>

<div class="gh-user-form">
    <?php $form = ActiveForm::begin(['layout' => 'horizontal',]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'login')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
