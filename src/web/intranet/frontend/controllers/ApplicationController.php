<?php

namespace frontend\controllers;

use Yii;
use common\models\Application;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ApplicationController implements the CRUD actions for Application model.
 */
class ApplicationController extends Controller
{
    /**
     * @inheritdoc
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

    /**
     * Lists all Application models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Application::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Application model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $itemsData= \common\models\ApplicationCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData, 'categoryap_id', 'categoryap_name');
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'items' => $items,
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Application();
        $itemsData= \common\models\ApplicationCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData, 'categoryap_id', 'categoryap_name');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {            
            return $this->redirect(['view', 'id' => $model->application_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Updates an existing Application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $itemsData= \common\models\ApplicationCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData, 'categoryap_id', 'categoryap_name');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->application_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Deletes an existing Application model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
    * Search an existing Application model.
    * @param integer $id
    */

    public function actionSearch()
    {
       $applications=Application::find();
       $count= clone $applications;
       $pages= new Pagination([
           "pageSize"=> 4,
           "totalCount"=> $count -> count()
       ]);
       $model=$applications
               ->offset($pages->offset)
               ->limit($pages->limit)
               ->all();
       return $this->render('link_application', [
            'model' => $model,
            'links' => $applications,
            'pages' =>$pages
        ]);
         
    }

    /**
     * Finds the Application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Application::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
