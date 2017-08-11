<?php
use yii\widgets\LinkPager;

$this->title = 'Noticias';
?>
<div>
    <div class="application-title">
     <?php
       echo"NOTICIAS</br></br>$description</br></br>";
     ?>
    </div>
     <?php
       foreach ($model as $row) {
     ?>
        <div class="news-body">
            <?php
            echo "\t<div class=\"news-item\"><div class=\"contenedor-news\"><img class=\"responsive-news-img\" src=\"$row->nbusiness_image\"></img><a class=\"\" target=\"\" href=\"/index.php?r=newsbusiness%2Fdetail&id=".$row->nbusiness_id."\">".substr($row->nbusiness_title,0,38)."</a><br>".substr($row->nbusiness_description, 0, 180)."...<br><br>FECHA: $row->nbusiness_date</div></div>\n";
            ?>
        </div>
     <?php }  ?>
     <div class="pagination-news-business">
        <?= LinkPager::widget([
        "pagination" => $pages,
        ]);
        ?> 
    </div>
    
    <?=
        (\Yii::$app->user->can('editNews'))?\yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', \yii\helpers\Url::to(['newsbusiness/index']), ['class'=>'botonF1']):"";
    ?>
</div>