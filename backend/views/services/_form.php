<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $form yii\widgets\ActiveForm */
/* @var $parentTitle string */
?>

<div class="content-form">
    <pre><? print_r($model); ?></pre>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true, 'value'=>\thamtech\uuid\helpers\UuidHelper::uuid(), 'readonly' => 1]) ?>

    <? $labelParentUuid = $model->getAttributeLabel('parent_uuid');
     if($parentTitle) {
         $labelParentUuid .= ' - ' . $parentTitle;
     } ?>
    <?= $form->field($model, 'parent_uuid')->textInput(['maxlength' => true, 'readonly'=>1])->label($labelParentUuid) ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model->seo, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
