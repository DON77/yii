<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
    /* @var $form  ActiveForm */

$this->title = 'Update Orders: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php $form = ActiveForm::begin();  ?>
    <?php foreach($orders as $i=>$model): 
        ?>
    <div class="orders-container">
        <div class="order-container" data-counter="0">
            <?php // $form->field($model, 'order_id')->textInput() ?>
            <div class="orders-item">
                <?= $form->field($model, "[$model->id]price")->textInput() ; ?>
            </div>
            <div class="orders-item">
                <?= $form->field($model, "[$model->id]description")->textInput() ?>
            </div>
            <div class="orders-item">
                <?=
                    $form->field($model, "[$model->id]available")->dropDownList(['Pick an option',
                        '0' => 'Not Available',
                        '1' => 'Available'])
                ?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary','onclick'=>'submitForm();']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
