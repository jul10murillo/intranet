<?php

namespace frontend\controllers;

use Yii;
use common\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
                'only'  => ['index','view', 'create', 'update','delete','show','search','rss','rssitem'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index','view', 'create', 'update','delete','show','search','rss','rssitem'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $itemsData= \common\models\NewsCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryne_id','categoryne_name');
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'items' => $items,
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $itemsData= \common\models\NewsCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryne_id','categoryne_name');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->news_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $itemsData= \common\models\NewsCategory::find()->all();
        $items= \yii\helpers\ArrayHelper::map($itemsData,'categoryne_id','categoryne_name');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->news_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /*Display news*/
    
    public function actionShow()
    {

        $news=News::find()->where(['categoryne_id'=>'1'])->orderBy('news_channel ASC');
        $newsArray = $news->all();
        $listData=ArrayHelper::map($newsArray,'news_id','news_channel');
        $category= \common\models\NewsCategory::find()->all();
        if (Yii::$app->request->post()) {
            $postNews = Yii::$app->request->post('News')['news_channel'];
            $news->where(['news_id'=>$postNews]);
        }
        
        $newsData = $news->all();
        return $this->render('show_news', [
        'news' => $newsData,
        'listData'=> $listData,
            ]);
     }
    
    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Acción de buscar noticias
     * @return type
     */
    public function actionSearch() {
        $searchString = Yii::$app->request->post('search') ;
        if (Yii::$app->request->post('search')) {
            Yii::$app->session['searchnews'] = $searchString ;
        } else {
            $searchString = Yii::$app->session['searchnews'] ;
        }

        $query = \common\models\NewsBusiness::find()->filterWhere(['or',
                ['like', 'nbusiness_title', $searchString],
                ['like', 'nbusiness_description', $searchString]
            ]) ;
        $count = $query->count() ;

        $pagination = new Pagination([
            "pageSize"   => 4,
            "totalCount" => $count
            ]) ;

        $data = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all() ;

        return $this->render('search', [
                    'data'       => $data,
                    'search'     => $searchString,
                    'pagination' => $pagination,
                    'count'      => $count,
                ]) ;
    }
    
    /**
     * Metodo para capturar RSS
     * @return type
     */
    public function actionRss() {
        \Feed::$cacheExpire = '5 hours' ;
        $sources            = News::find()->all() ;

        foreach ($sources as $source) {
            $rssData = \Feed::loadRss($source->news_link) ;
            $rss     = $rssData->toArray() ;

            $imageRss = isset($rss['image']) ? $rss['image']['url'] : "" ;
            foreach ($rss['item'] as $value) {
                preg_match_all('/<img[^>]+>/i', $value['description'], $result) ;
                if (isset($result[0][0])) {
                    preg_match('@src="([^"]+)"@', $result[0][0], $match) ;
                    $image = $match[1] ;
                } else {
                    $image = $imageRss ;
                }
                $data[] = [
                    'title'       => $rss['title'],
                    'link'        => $rss['link'],
                    'generator'   => $rss['link'],
                    'image'       => $image,
                    'pubDate'     => $value['pubDate'],
                    'titleNews'   => $value['title'],
                    'linkNews'    => $value['link'],
                    'description' => $value['description'],
                    'creator'     => $value['dc:creator'],
                        ] ;
            }
        }

        $provider = new ArrayDataProvider([
            'allModels'  => $data,
            'sort'       => [
                'attributes' => ['pubDate'],
            ],
            'pagination' => [
                'pageSize' => 6,
            ],
                ]) ;

        return $this->render('rss', [
                    'provider' => $provider
        ]) ;
    }
    
    function actionRssitem() {

        $model = [
            'titleNews'   => $_POST['titleNews'],
            'description' => $_POST['description'],
            'title'       => $_POST['title'],
            'creator'     => $_POST['creator'],
            'pubDate'     => $_POST['pubDate'],
            'link'        => $_POST['link'],
                ] ;
        return $this->render('rssitem', [
                    'model' => $model
        ]) ;
    }

}
