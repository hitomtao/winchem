<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Classes;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'class_id')->dropDownList((['0' => '请选择'] + Classes::getMainColumnName())) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?php 
        if ($model->img) {
            echo Html::img("/uploads/{$model->img}", ['width' => 300]);
        } 
    ?>
    
    <?= $form->field($model, 'summary')->textarea() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>