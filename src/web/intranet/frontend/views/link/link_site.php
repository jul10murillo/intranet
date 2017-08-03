<?php
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div>
    <div>
         <?php
         foreach ($model as $row){
        ?>
        <div class="application-title" >
            <?php 
            echo $row-> link_name;
            ?>       
        </div>
        <div class="mission-body">
            <p></br>
            <?php 
            echo $row-> link_description;
            ?>
            </p>
        </div>
        <div class="btn-application">
            <a href="<?php echo $row-> url;?>" target="_blank">INICIAR</a>
        </div>
       <?php
          }  
       ?> 
       <br>
    </div>
    <div class="pagination-link-application">
    <?= LinkPager::widget([
        "pagination" => $pages,
    ]);
    ?>     
    </div>
</div>