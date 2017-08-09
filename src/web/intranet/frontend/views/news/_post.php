<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
//print_r($model);exit;
?>
<div class="post">
    <div class="media">
        <div class="media-left media-top">
            <?php
            echo Html::a('<img class="media-object " src="'.$model["image"].'" alt="...">', ['news/rssitem'], [
                'data'=>[
                    'method'=>'post',
                    'params' => [
                        'titleNews'   => Html::encode($model['titleNews']),
                        'description' => Html::encode($model['description']),
                        'title'       => Html::encode($model['title']),
                        'pubDate'     => Html::encode($model['pubDate']),
                        'link'        => Html::encode($model['link']),
                    ],
                ]
            ]);
            ?>
            <a href="<?= Url::to(['/news/rssitem'],['data-method' => 'POST','data-params' => ['model'=>$model]]) ?>">
                
            </a>
        </div>
        <div class="media-body">
            <?php
            echo Html::a('<h4 class="media-heading">'.$model['titleNews'].'</h4>', ['news/rssitem'], [
                'data'=>[
                    'method'=>'post',
                    'params' => [
                        'titleNews'   => Html::encode($model['titleNews']),
                        'description' => Html::encode($model['description']),
                        'title'       => Html::encode($model['title']),
                        'pubDate'     => Html::encode($model['pubDate']),
                        'link'        => Html::encode($model['link']),
                    ],
                ]
            ]);
            ?>
            <p>
                <?= substr(strip_tags($model['description']),0,250).'...' ?>
            </p>
        </div>
        <div class="media-footer text-right">
            <?=$model['pubDate']?> - <?=$model['title']?>
        </div>
    </div>
</div>