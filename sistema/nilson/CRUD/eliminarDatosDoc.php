<?php
    include("../Config/conexion.php");

    $id = $_REQUEST['Id'];
    // $sql = "DELETE FROM docente WHERE IdDocente ='$id'";
    $sql = "UPDATE docente SET EstDocente = 1 WHERE DNIDOCE = '$id'";

    $query = mysqli_query($conn, $sql);

    if($query === TRUE){
        header("location: ../index.php");
    }