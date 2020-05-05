<?php

namespace backend\controllers;

use common\models\ContentTypes;
use kartik\form\ActiveForm;
use kr0lik\tree\TreeManagerAction;
use Yii;
use common\models\Content;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
{

    public $contentType = null;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function getContentQuery(){
        $query =  Content::find();
        if($this->contentType){
            $query->joinWith('contentType')
                ->where('content_types.nickname=:contentTypeNN', ['contentTypeNN' => $this->contentType]);
        }
        return $query;
    }

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = $this->getContentQuery();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $tree = Content::getTree($query);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'tree' => $tree,
        ]);
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if($model->parent_uuid) {
            $parentModel = Content::findParent($model->parent_uuid);
            $model->parent_uuid = $parentModel->title;
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();
        $contentTypes = ContentTypes::find()->all();
        $data = Yii::$app->request->post();
        $getData = Yii::$app->request->get();
        $parent = null;

        // Автоматическая подстановка contentType, когда он определен
        if($data && $this->contentType){
            $data["Content"]["content_type_uuid"] = $model->getContentTypeByNN($this->contentType)->uuid;
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // Если указан id родительского элемента
        if($getData['parent_id']){
            $parent = Content::findOne($getData['parent_id']);
            if($parent){
                $model->parent_uuid = $parent->uuid;
            }
        }

        return $this->render('create', [
            'model' => $model,
            'contentTypes' => $contentTypes,
            'parentTitle' => $parent ? $parent->title : '',
        ]);
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $contentTypes = ContentTypes::find()->all();
        $parent = null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // Если указан id родительского элемента
        if($model->parent_uuid){
            $parent = Content::findParent($model->parent_uuid);
        }

        return $this->render('update', [
            'model' => $model,
            'contentTypes' => $contentTypes,
            'parentTitle' => $parent ? $parent->title : '',
        ]);
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }
}
