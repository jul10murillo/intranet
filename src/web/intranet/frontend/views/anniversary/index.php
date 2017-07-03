<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;


?>
<div class="info-employee-title">
    <h1>Aniversarios del mes</h1>
</div>
<div class="info-employee-body">
    <p>Gracias por pertenecer a esta gran familia, por dedicar tiempo y esmero, enalteciendo el espíritu de trabajo en equipo que define a Grupo Dumit.
    <br><br>
    ¡Celebramos con ustedes su mes Aniversario!
    </p>
    <br>
    <?php
    foreach ($usersActive as $item){
    ?>
    <div class="info-employee-item">
    <span class="glyphicon glyphicon-calendar"></span>    
    <?php
            $firstname = !is_null($item->getFirstName())?$item->getFirstName():"";
            
            $lastname=!is_null($item->getLastName())?$item->getLastName():"";
            echo 'Empleado: '.$firstname.' '.$lastname.'</br>';

            $department = !is_null($item->getDepartment())?$item->getDepartment():"";
            echo 'Departamento: '.$department.'</br>';
            
            $finicio = !is_null($item->getFinicio())?$item->getFinicio()[0]:"no tiene fecha ingreso";
            echo 'Fecha de Ingreso: '.$finicio.'</br>';
            echo '</br>';
    ?>
     </div>
   <?php }?>
</div>