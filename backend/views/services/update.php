<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $parentTitle */

$this->title = 'Изменение услуги: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение услуги';
?>
<div class="content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parentTitle' => $parentTitle
    ]) ?>

</div>
