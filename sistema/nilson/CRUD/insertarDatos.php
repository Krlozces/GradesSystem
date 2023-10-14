<?php
    include ("../Config/conexion.php");
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['tel'];
    $especialidad = $_POST['especialidad'];

    $stmt = $conn -> prepare("INSERT INTO docente(DNIDOCE, NOMDocente, ApeDocente, Telefono, IdEspecialidad) VALUES (?, ?, ?, ?, ?)");
    $stmt ->bind_param("sssss", $dni, $nombre, $apellidos, $telefono, $especialidad);

    $resultado = $stmt ->execute();

    if($resultado === TRUE){
        header("location:../index.php");
    }else{
        echo "Datos no insertados";
    }
