<?php

    require '../Config/conexion.php';
    $id = $_POST['id'];
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $telefono = $conn->real_escape_string($_POST['tel']);
    $email = $conn->real_escape_string($_POST['email']);
    $sql = "UPDATE alumno SET
        NomAlumno = '".$nombre."',
        ApeAlumno = '".$apellidos."',
        FechaNaci = '".$telefono."',
        Email = '".$email."'
        WHERE ALUMDNI = '".$id."'
    ";

    try {
        if($resultado = $conn->query($sql)){
            header("location:../tableEstudiantes.php");
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getCode() . ' - ' . $e->getMessage();
    }