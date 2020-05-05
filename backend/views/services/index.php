<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\HtmlHelper;

use execut\widget\TreeView;
use yii\web\JsExpression;
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $tree array
 */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать услугу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <? if($tree){ ?>
        <div>
            <?= HtmlHelper::getCollapseTree($tree, Yii::$app->request->url); ?>
        </div>
    <? } ?>


</div>
