<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


<?php
$script = <<< JS
    $( document ).ready(function() {
        runWinZip();
    });
        function runWinZip() { 
            var shell = new ActiveXObject("WScript.shell"); 
        if (shell){ 
                shell.run("winzip.exe"); 
        }else{ 
            alert("WinZip is not installed on your system."); 
        }
    }
JS;
$this->registerJs($script);
?>