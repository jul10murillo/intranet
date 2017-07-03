<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;


?>
<div class="info-employee-title">
    <h1>Cumpleañeros del mes</h1>    
</div>
<div class="info-employee-body">
    <p>Todos formamos parte de esta gran familia, por lo tanto queremos demostrar lo importante que son para nosotros todos y cada cada uno de ustedes, en especial en el día de su cumpleaños.
    <br><br>
    ¡Felicidades Cumpleañeros!
    </p>
    <br>
    <?php
    foreach ($usersActive as $item){
    ?>
    <div class="info-employee-item">
    <span class="glyphicon glyphicon-gift"></span>
    <?php
            $firstname = !is_null($item->getFirstName())?$item->getFirstName():"";
            
            $lastname=!is_null($item->getLastName())?$item->getLastName():"";
            echo 'Empleado: '.$firstname.' '.$lastname.'</br>';
//            $department = $item->getDepartment();
            $department = !is_null($item->getDepartment())?$item->getDepartment():"";
            echo 'Departamento: '.$department.'</br>';
//            print_r($item->getDepartment());exit;
            
            $fnacimiento = !is_null($item->getFnacimiento())?$item->getFnacimiento()[0]:"no tiene fnacimiento";
            echo 'Fecha de Nacimiento: '.$fnacimiento.'</br>';
            
            echo '</br>';
//            exit;
  ?>
  </div>
   <?php }?>
</div>

