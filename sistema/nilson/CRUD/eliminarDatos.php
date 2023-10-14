<?php
    include("../Config/conexion.php");

    $id = $_POST['id'];
    // $sql = "DELETE FROM docente WHERE IdDocente ='$id'";
    $sql = "UPDATE alumno SET EstEst = 1 WHERE ALUMDNI = '$id'";

    $query = mysqli_query($conn, $sql);

    if($query === TRUE){
        header("Location: ../tableEstudiantes.php");
    }