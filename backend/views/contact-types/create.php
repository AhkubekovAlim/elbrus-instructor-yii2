<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactTypes */

$this->title = 'Create Contact Types';
$this->params['breadcrumbs'][] = ['label' => 'Contact Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
