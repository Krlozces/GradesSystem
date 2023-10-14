<?php
    include_once("../Config/conexion.php");
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['tel'];
    $especialidad = $_POST['especialidad'];
    echo $especialidad;
    $sql = "UPDATE docente SET
        NomDocente = '".$nombre."',
        Apedocente = '".$apellidos."',
        TelDocente = '".$telefono."',
        IdEsp = '".$especialidad."'
        WHERE IdDocente = '".$id."'
    ";

    try {
        if($resultado = $conn->query($sql)){
            header("location:../index.php");
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getCode() . ' - ' . $e->getMessage();
    }
    