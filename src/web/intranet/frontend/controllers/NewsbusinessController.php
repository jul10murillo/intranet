<?php

namespace frontend\controllers;

use Yii;
use common\models\NewsBusiness;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * NewsbusinessController implements the CRUD actions for NewsBusiness model.
 */
class NewsbusinessController extends Controller
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
     * Lists all NewsBusiness models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => NewsBusiness::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsBusiness model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NewsBusiness model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsBusiness();

        $itemsData= \common\models\NewsCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryne_id','categoryne_name');
        
        if ($model->load(Yii::$app->request->post())) {
            
            //get the instance of the uploaded file
            
            $imageName= $model->nbusiness_title;
            $model ->file=UploadedFile::getInstance($model,'file');
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension );
            
            //save the path in the db column
            
            $model->nbusiness_image='uploads/'.$imageName.'.'.$model->file->extension;
            
            $model->save();
                    
            return $this->redirect(['view', 'id' => $model->nbusiness_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Updates an existing NewsBusiness model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $itemsData= \common\models\NewsCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryne_id','categoryne_name');
        
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            
            if (($model->file=UploadedFile::getInstance($model,'file'))!= NULL) {
                $imageName= $model->nbusiness_title;

                //get the instance of the uploaded file
                $model ->file=UploadedFile::getInstance($model,'file');
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension );

                //save the path in the db column
                $model->nbusiness_image='uploads/'.$imageName.'.'.$model->file->extension;
            }
           
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->nbusiness_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Deletes an existing NewsBusiness model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     /*Display news business*/
    
    public function actionShow($id)
    {
       $news=NewsBusiness::find()->where(['categoryne_id'=>$id])->orderBy('nbusiness_date DESC');
       $count= clone $news;

       $category= \common\models\NewsCategory::find()->all();
       foreach ($category as $rowc) {
            if ($rowc->categoryne_id ==$id ) {
                $description=$rowc->categoryne_name;
            } 
        }

       $pages= new Pagination([
           "pageSize"=> 2,
           "totalCount"=> $count -> count()
       ]);

       $model=$news
               ->offset($pages->offset)
               ->limit($pages->limit)
               ->all();

       return $this->render('show_news_business', [
            'model' => $model,
            'news' => $news,
            'pages' =>$pages,
            'description'=>$description,
        ]);
       
     }
     
     /*Display  detail news business*/
     
     public function actionDetail($id)
    {
       $category= \common\models\NewsCategory::find()->all();

       return $this->render('detail_news_business', [
            'model' => $this->findModel($id),
            'category'=> $category,
       ]);
       
     }
    
    /**
     * Finds the NewsBusiness model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsBusiness the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsBusiness::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
