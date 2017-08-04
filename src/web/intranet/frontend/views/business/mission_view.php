<?php
//use kartik\slider\Slider;

?>
 <div class="fondo-slider">
    <?= \edofre\sliderpro\SliderPro::widget([
    'id'            => 'my-slider',
    'sliderOptions' => [
    'width'  => '100%',
    'height' => 265,
    'arrows' => true,
    'init'   => new \yii\web\JsExpression("
    function() {
       console.log('El slider ha inicializado');
    }
    "),
    ],
    ]);
    ?>
 
    <div class="slider-pro" id="my-slider">
        <div class="sp-slides">
            <!-- Slide 1 -->
            <div class="sp-slide">
                <img class="sp-image" src="http://lorempixel.com/960/500/business/5"/>
            </div>
            <!-- Slide 2 -->
            <div class="sp-slide">
                <img class="sp-image" src="http://lorempixel.com/960/500/business/4"/>
<!--                <p class="sp-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
            </div>
            <!-- Slide 3 -->
            <div class="sp-slide">
                <img class="sp-image" src="http://lorempixel.com/960/500/business/6"/>
<!--                <p>Lorem ipsum dolor sit amet</p>-->
            </div>
            <!-- Slide 4 -->
    <!--        <div class="sp-slide">
                <img class="sp-image" src="http://lorempixel.com/960/500/sports/3"/>
                <h3 class="sp-layer sp-black"
                    data-position="bottomLeft" data-horizontal="10%"
                    data-show-transition="left" data-show-delay="300" data-hide-transition="right">
                    Lorem ipsum dolor sit amet
                </h3>
                <p class="sp-layer sp-white sp-padding"
                   data-width="200" data-horizontal="center" data-vertical="40%"
                   data-show-transition="down" data-hide-transition="up">
                    consectetur adipisicing elit
                </p>
                <div class="sp-layer sp-static">Static content</div>
            </div>-->
            <!-- Slide 5 -->
    <!--        <div class="sp-slide">
                <h3 class="sp-layer">Lorem ipsum dolor sit amet</h3>
                <p class="sp-layer">consectetur adipisicing elit</p>
            </div>-->

            <!-- thumbnails -->
    <!--        <div class="sp-thumbnails">
                <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/1" data-src="http://lorempixel.com/480/250/sports/1"/>
                <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/2" data-src="http://lorempixel.com/480/250/sports/2"/>
                <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/3" data-src="http://lorempixel.com/480/250/sports/3"/>
                <p class="sp-thumbnail">Thumbnail 4</p>
                <p class="sp-thumbnail">Thumbnail 5</p>
            </div>-->
        </div>
    </div>
    <!-- end .slider --></div> 
    <div class="">
        <div class="mission-title">
            <h1 >Misión</h1>
        </div> 
        <div class="mission-body"> 
            
            <?php 
                echo $model->mission_description; 
            ?>
            
        </div>        
    <!-- end .mission --></div>
    <div class="">
        <div class="mission-title">   
            <h1>Visión</h1>
        </div>
        <div class="mission-body">
            
             <?php 
                echo $model->view_description; 
            ?>
            
        </div>
        <?=
        (\Yii::$app->user->can('editMision'))?\yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', \yii\helpers\Url::to(['business/index']), ['class'=>'botonF1']):"";
        ?>
 <!-- end .view --></div>