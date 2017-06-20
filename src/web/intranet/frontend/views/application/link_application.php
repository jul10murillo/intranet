<?php
use yii\data\Pagination;
use yii\widgets\LinkPager;

//print_r($applications);
//exit;
?>
<div>
    <div>
         <?php
         foreach ($model as $row){
        ?>
        <div class="application-title" >
            <?php 
            echo $row-> application_name;
            ?>
        </div>
        <div class="mission-body">
            <p></br>
            <?php 
            echo $row-> application_description;
            ?>
            </p>
        </div>
        <div class="btn-application">
            <a href="<?php echo $row-> application_url;?>" target="_blank">INICIAR</a> 
        </div>
       <?php
          }  
         ?> 
    </div>
    <div class="paginacion">
    <?= LinkPager::widget([
        "pagination" => $pages,
    ]);
    ?> 
    </div>
</div>