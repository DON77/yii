<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">
    <div class="add-remove">
        <i id="add-item" class="glyphicon glyphicon-plus-sign"></i>
        <i class="spliter">/</i>
        <i id="remove-item" class="glyphicon glyphicon-minus-sign">&nbsp;&nbsp;</i>
    </div>
    <div class="orders-container">
        <div class="order-container" data-counter="0">
            <?php $form = ActiveForm::begin(); ?>

            <?php // $form->field($model, 'order_id')->textInput() ?>
            <div class="orders-item">
                <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'class' => "order-item form-control", 'placeholder' => 'Please add price of item...']) ?>
            </div>
            <div class="orders-item">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'class' => "order-item form-control", 'placeholder' => 'Please add description of item...']) ?>
            </div>
            <div class="orders-item">
                <?=
                $form->field($model, 'available')->dropDownList(['Pick an option',
                    '0' => 'Not Available',
                    '1' => 'Available'])
                ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick'=>'submitForm();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
