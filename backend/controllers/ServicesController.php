<?php

namespace backend\controllers;

use common\models\Content;
use yii\web\NotFoundHttpException;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ServicesController extends ContentController
{

    public $contentType = 'services';


    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::find()->with('seo')->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }

}
