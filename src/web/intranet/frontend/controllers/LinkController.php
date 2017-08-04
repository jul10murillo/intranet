<?php

namespace frontend\controllers;

use Yii;
use common\models\Link;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\filters\AccessControl;

/**
 * LinkController implements the CRUD actions for Link model.
 */
class LinkController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index','view', 'create', 'update','delete','search'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index','view', 'create', 'update','delete','search'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Link models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Link::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Link model.
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
     * Creates a new Link model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Link();
        $itemsData= \common\models\LinkCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryli_id','categoryli_name');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->link_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Updates an existing Link model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $itemsData= \common\models\LinkCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryli_id','categoryli_name');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->link_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'items' => $items,
            ]);
        }
    }

    /**
     * Deletes an existing Link model.
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
    * Search an existing Link model.
    * @param integer $id
    */
    public function actionSearch() {
        $links = Link::find() ;

        if (Yii::$app->request->isPost) {
            $searchString                    = Yii::$app->request->post('search') ;
            Yii::$app->session['searchlink'] = $searchString ;
            
            $links = Link::find()->filterWhere(['or',
                ['like', 'link_name', $searchString],
                ['like', 'link_description', $searchString]
            ]) ;
            
        } else {
            $searchString = Yii::$app->session['searchlink'] ;
        }
        
        $count = $links->count();
        $pages = new Pagination([
            "pageSize"   => 3,
            "totalCount" => $count
        ]) ;
        $model = $links
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all() ;
        return $this->render('link_site', [
                    'model' => $model,
                    'links' => $links,
                    'pages' => $pages,
                    'search' => $searchString,
                    'count' => $count
        ]) ;
    }

    /**
     * Finds the Link model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Link the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Link::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
