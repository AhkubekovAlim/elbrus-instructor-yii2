<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $contentTypes */

$this->title = 'Обновить контент: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Контент', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'contentTypes' => $contentTypes
    ]) ?>

</div>
