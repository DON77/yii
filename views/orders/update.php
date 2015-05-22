<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Update Orders: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $row,
    ]) ?>


    <?php $form = ActiveForm::begin(); ?>
    <?php foreach($rows as $i=>$model):?>
    <div class="orders-container">
        <div class="order-container" data-counter="0">
            <?php // $form->field($model, 'order_id')->textInput() ?>
            <div class="orders-item">
                <?= $form->field($model, "price")->textInput(['maxlength' => true, 'class' => "order-item form-control", 'placeholder' => 'Please add price of item...']) ?>
            </div>
            <div class="orders-item">
                <?= $form->field($model, "description")->textInput(['maxlength' => true, 'class' => "order-item form-control", 'placeholder' => 'Please add description of item...']) ?>
            </div>
            <div class="orders-item">
                <?=
                    $form->field($model, "available")->dropDownList(['Pick an option',
                        '0' => 'Not Available',
                        '1' => 'Available'])
                ?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <div class="form-group">
        <?= Html::button('Update', ['class' => 'btn btn-primary','onclick'=>'submitForm();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
