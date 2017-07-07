<?php
use yii\widgets\LinkPager;

?>
<div>
    <div class="application-title">
      NOTICIAS</br></br>
    </div>
     <?php
       foreach ($model as $row) {
     ?>
        <div class="news-body">
            <?php
            //            echo "\t<div class=\"news-item\"><div class=\"\"><img class=\"responsive-news-img\" src=\"$row->nbusiness_image\"></img></div><div class=\"news_link\"><a target=\"\" href=\"\">".$row->nbusiness_title."</a></div><div><br>$row->nbusiness_description<br><br>FECHA: $row->nbusiness_date</div></div>\n";
            echo "\t<div class=\"news-item\"><div class=\"contenedor-news\"><img class=\"responsive-news-img\" src=\"$row->nbusiness_image\"></img><a class=\"\" target=\"\" href=\"/index.php?r=newsbusiness%2Fdetail&id=".$row->nbusiness_id."\">".$row->nbusiness_title."</a><br>".substr($row->nbusiness_description, 0, 247)."...<br><br>FECHA: $row->nbusiness_date</div></div>\n";
            ?>
        </div>
     <?php }  ?>
     <div class="">
        <?= LinkPager::widget([
        "pagination" => $pages,
        ]);
        ?> 
    </div>
</div>