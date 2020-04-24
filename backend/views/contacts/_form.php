<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true, 'value'=>\thamtech\uuid\helpers\UuidHelper::uuid(), 'readonly'=>1]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contact_type_uuid')->dropDownList(\yii\helpers\ArrayHelper::map($contactTypes, 'uuid', 'title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
