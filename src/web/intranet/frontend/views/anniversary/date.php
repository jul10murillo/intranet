<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = "Calendario" ;
?>
<h2 class="title-login">Calendario</h2>
<br>
<div class="col-lg-8 col-md-8">
    <div id='calendar'></div>
</div>
<div class="col-lg-4 col-md-4 back-date">
    <h3 class="label-gd">
        Leyenda
    </h3>
    <ul class="legend">
        <li class="legend-item"><span class="back-anniversary"></span>  Cumpleaños</li>
        <li class="legend-item"><span class="back-birthday"></span>  Aniversario</li>
    </ul>
    <h3 class="label-gd">
        Mis Fechas
    </h3>
    <ul>
        <li class="date-item"><span class="glyphicon glyphicon-gift birthday-icon"></span> <?=$birthdayUser ?></li>
        <li class="date-item"><span class="glyphicon glyphicon-calendar anniversary-icon"></span> <?=$anniversaryUser ?></li>
    </ul>
    <h3 class="label-gd">
        Cumpleañeros del mes de <?= $month ?>
    </h3>
    <ul>
        <?php if(isset($birthday[0])): ?>
        <?php foreach ($birthday as $value) :?>
        <li class="date-item"><span class="glyphicon glyphicon-gift birthday-icon"></span> <?=$value ?></li>
        <?php endforeach ;?>
        <?php endif ; ?>
    </ul>

    <h3 class="label-gd">
        Aniversarios del mes de <?= $month ?>
    </h3>
    <ul>
        <?php if(isset($anniversary[0])): ?>
        <?php foreach ($anniversary as $value) :?>
        <li class="date-item"><span class="glyphicon glyphicon-calendar anniversary-icon"></span> <?=$value ?></li>
        <?php endforeach ;?>
        <?php endif ; ?>
    </ul>
</div>


<?php
$url = yii\helpers\Url::to(['/anniversary/jsonanniversary']);
$urlbirthday = yii\helpers\Url::to(['/anniversary/jsonbirthday']);
$bdayImage  = yii\helpers\Url::to('@web/uploads/icon/bday.png');
$adayImage  = yii\helpers\Url::to('@web/uploads/icon/aday.png');
$script = <<< JS
    $(document).ready(function() {
        $.ajax({
            url: "$urlbirthday",
        }).done(function(data) {
            var result = JSON.parse(data);
            if (result.bday.status == true && result.aday.status == true) {
                swal({
                        title: "¡Feliz Cumpleaños!",
                        text: "Grupo Dumit te desea un feliz cumpleaños.",
                        imageUrl: "$bdayImage",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false
                    },
                function(){
                    swal({
                        title: "¡Feliz Aniversario!",
                        text: "En Grupo Dumit estamos complacidos de contar con tu trabajo durante estos "+result.aday.description.y+" años",
                        imageUrl: "$adayImage"
                    });
                });
            }
            if (result.bday.status == true && result.aday.status == false) {
                sweetAlert({
                    title: "¡Feliz Cumpleaños!",
                    text: "Grupo Dumit te desea un feliz cumpleaños.",
                    imageUrl: "$bdayImage"
                });
            }
            if (result.aday.status == true && result.bday.status == false) {
                swal({
                    title: "¡Feliz Aniversario!",
                    text: "En Grupo Dumit estamos complacidos de contar con tu trabajo durante estos "+result.aday.description.y+" años",
                    imageUrl: "$adayImage"
                });
            }
            console.log(result);
        });
        
        $('#calendar').fullCalendar({
            validRange: {
                start: new moment('$year-01-01', "YYYY-MM-DD"),
                end: new moment('$year-12-31', "YYYY-MM-DD")
            },
            editable: true,
            navLinks: true,
            lang: 'es',
            allDay: true,
            header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
            eventLimit: true, // allow "more" link when too many events
            events: '$url',
            eventColor: '#378006',
            eventRender: function(event, element) {
                if (element && event.description) {
                    element.qtip({
                        content: event.description,
                        style: {
                            width: 300, // Overrides width set by CSS (but no max-width!)
                            height: 25, // Overrides height set by CSS (but no max-height!)
                        }
                    });
                }
            }
        });
    });
        
JS;
$this->registerJs($script);
?>