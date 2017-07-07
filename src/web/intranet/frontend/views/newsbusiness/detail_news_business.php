<?php
//use yii\widgets\LinkPager;

?>
<div>
    <div class="application-title">
      NOTICIAS</br></br>
    </div>
     <?php
       foreach ($detail as $row) {
     ?>
        <div class="news-body">
            <?php
            //            echo "\t<div class=\"news-item\"><div class=\"\"><img class=\"responsive-news-img\" src=\"$row->nbusiness_image\"></img></div><div class=\"news_link\"><a target=\"\" href=\"\">".$row->nbusiness_title."</a></div><div><br>$row->nbusiness_description<br><br>FECHA: $row->nbusiness_date</div></div>\n";
            echo "\t<div class=\"news-item\"><div class=\"contenedor-news\"><img class=\"responsive-news-img\" src=\"$row->nbusiness_image\"></img><a class=\"\" target=\"\" href=\"\">".$row->nbusiness_title."</a><br>$row->nbusiness_description...<br><br>FECHA: $row->nbusiness_date</div></div>\n";
            ?>
        </div>
     <?php }  ?>
</div>