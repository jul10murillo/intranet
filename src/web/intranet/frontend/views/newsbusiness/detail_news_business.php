<?php
//use yii\widgets\LinkPager;

$this->title = 'Noticias';
?>
<div>
     <?php
       foreach ($category as $rowc) {
            if ($rowc->categoryne_id ==$model->categoryne_id ) {
                $description=$rowc->categoryne_name;
            }    
    }?>
    <div class="application-title">
      <?php
       echo"NOTICIAS</br></br>$description</br></br>";
     ?>
     </div>
        <div class="news-body">
            <?php
            echo "\t<div class=\"news-item\"><div class=\"detail-title\">".$model->nbusiness_title."</div><div><br><span class=\"glyphicon glyphicon-time\"></span>&nbsp;&nbsp;$model->nbusiness_date</div><div class=\"detail-img\"><br><img class=\"responsive-detail-img\" src=\"$model->nbusiness_image\"></img></div><div><br>$model->nbusiness_description<br><br></div></div><br>\n";
            
            echo "<div class=\"boton_regresar\">".\yii\helpers\Html::a('<< Regresar', Yii::$app->request->referrer)."</div>";
            ?>
        </div>
     </div>