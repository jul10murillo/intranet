<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Mostrar', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
     <?php
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
                    ////Juego de caracteres por defecto a ISO-8859-1 (si no, sería UTF-8)
//                    $rss->cp = 'ISO-8859-1'; 
                    //Cambio el formato de fechas a español
                    //$rss->date_format = 'd/m/Y';

                    // load RSS file
                    if ($rs = $rss->get($row-> news_link)) {
//                        if ($rs[image_url] != '') {
//                                    echo "<a href=\"$rs[image_link]\"><img src=\"$rs[image_url]\" alt=\"$rs[image_title]\" vspace=\"1\" border=\"0\" /></a><br />\n";
//                        }
                        foreach($rs['items'] as $item) {                            
                            echo "\t<div class=\"news-item\"><div class=\"news_link\"><img src=\"\"></img><a target=\"_blank\" href=\"$item[link]\" type=\"application/rss+xml\" >".$item['title']."</a></div><div><br>$item[description]<br><br>FECHA: $item[pubDate]</div></div>\n";
                        }
//                        print_r($rs);
                    }
                    else {
                        die ('Error: Archivo RSS no encontrado...');
                    }
                ?>
            </div>
     <?php } ?>
</div>