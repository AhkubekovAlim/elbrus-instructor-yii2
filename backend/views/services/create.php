<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = 'Создание услуги';
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'contentTypes' => $contentTypes
    ]) ?>

</div>
