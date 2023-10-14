<?php

    $host = 'localhost';
    $user = 'root';
    $contra = '';
    $db = 'sistemagrupo';

    $conexion = @mysqli_connect($host,$user,$contra,$db);


    if(!$conexion){
        echo "Error en la conexion";
    }

?>