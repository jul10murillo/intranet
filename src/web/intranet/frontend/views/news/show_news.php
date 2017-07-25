<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use common\models\News;

include "lastrss.php";
?>
<div>
    <div class="">
        <div class="application-title">
            NOTICIAS
        </div>
        <?php $form = ActiveForm::begin();?>
            <div class="">
                <?php 
                    $model = new News();
                    echo $form->field($model, 'news_channel')->dropDownList($listData, ['prompt'=>'Seleccione el Canal','class' =>'form-control'])->label(false);
//                    echo $form->field($model, 'news_channel')->dropDownList($listData, ['prompt'=>'Seleccione el Canal','class' =>'form-control','options' => ['1' => ['selected'=>'selected']]])->label(false);
                ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Mostrar', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
     <?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($news as $row) {
     ?>
            <div class="news-title">
                 <?php 
                    
                 echo $row-> news_channel;
                ?> 
            </div> 
            <div class="news-body">
                <?php
                    // create lastRSS object
                    $rss = new lastRSS;

                    // setup transparent cache
                    $rss->cache_dir = '/cache';
                    $rss->cache_time = 3600; // one hour

                    // load RSS file
                    if ($rs = $rss->get($row-> news_link)) {
//                        if ($rs[image_url] != '') {
//                                    echo "<a href=\"$rs[image_link]\"><img src=\"$rs[image_url]\" alt=\"$rs[image_title]\" vspace=\"1\" border=\"0\" /></a><br />\n";
//                        }
                           
                        foreach($rs['items'] as $item) {
                            $news=$rs['items'];
                            $count= count($news);
                            $pages= new Pagination([
                            "pageSize"=> 4,
                            "totalCount"=> $count 
                            ]);
//                             $model=$news
//                                    ->offset($pages->offset)
//                                    ->limit($pages->limit)
//                                     ->all();
//                            echo "\t<div class=\"news-item\"><div class=\"news_link\"><img src=\"\"></img><a target=\"_blank\" href=\"$item[link]\" type=\"application/rss+xml\" >".$item['title']."</a></div><div><br>$item[description]<br><br>FECHA: $item[pubDate]</div></div>\n";
                            echo "\t<div class=\"news-item\"><div class=\"\"><img src=\"\"></img><a class=\"news_link\" target=\"_blank\" href=\"$item[link]\" type=\"application/rss+xml\" >".$item['title']."</a></div><div><br><br><span class=\"glyphicon glyphicon-time\"></span>&nbsp;&nbsp;FECHA: $item[pubDate]</div></div>\n";
                        }
//                        print_r($rs);
                    }
                    else {
                        die ('Error: Archivo RSS no encontrado...');
                    }
                ?>
            </div>
            <div class="">
                <?= LinkPager::widget([
                    "pagination" => $pages,
                ]);
                ?> 
            </div>
     <?php } } ?>
</div>