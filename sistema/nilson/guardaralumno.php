<?php
session_start();

// Incluir el archivo de conexión a la base de datos
include("Config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de Alumno
    $alumdni = $_POST['alumdni'];
    $nomAlumno = $_POST['nomAlumno'];
    $apeAlumno = $_POST['apeAlumno'];
    $fechaNaciAlumno = $_POST['fechaNaciAlumno'];
    $sexo = $_POST['sexo']; 
    $emailAlumno = $_POST['emailAlumno'];
    $direccionAlumno = $_POST['direccionAlumno'];
    

    // Verificar si el ALUMDNI ya existe
    $sqlVerificarDNI = "SELECT COUNT(*) as count FROM Alumno WHERE ALUMDNI = '$alumdni'";
    $resultDNI = $conn->query($sqlVerificarDNI);
    $rowDNI = $resultDNI->fetch_assoc();

    if ($rowDNI['count'] == 0) {
        // No existe un registro con el mismo ALUMDNI, proceder a insertar
        $sqlAlumno = "INSERT INTO Alumno (ALUMDNI, NomAlumno, ApeAlumno, FechaNaci, Email, Direccion, sexo)
                     VALUES ('$alumdni', '$nomAlumno', '$apeAlumno', '$fechaNaciAlumno', '$emailAlumno', '$direccionAlumno', '$sexo')";

        if ($conn->query($sqlAlumno) === TRUE) {
            $_SESSION['success'] = "Los datos del alumno se registraron con éxito.";
        } else {
            $_SESSION['error'] = "Error al registrar los datos del alumno: " . $conn->error;
        }
    } else {
        $_SESSION['error'] = "El Alumno ya está registrado.";
    }

    // Resto del código para Grado (sin cambios)
    // ...
    $nomGrado = $_POST['nomGrado'];

     // Verificar si ya existe un registro con el mismo nombre de grado
     $sqlVerificar = "SELECT COUNT(*) as count FROM Grado WHERE NomGrado = '$nomGrado'";
     $result = $conn->query($sqlVerificar);
     $row = $result->fetch_assoc();
     
     if ($row['count'] == 0) {
         // No existe un registro con el mismo nombre de grado, proceder a insertar
         $sqlGrado = "INSERT INTO Grado (NomGrado) VALUES ('$nomGrado')";
         
         if ($conn->query($sqlGrado) === TRUE) {
             $_SESSION['success'] = "Los datos se registraron con éxito.";
         } else {
             $_SESSION['error'] = "Error al registrar los datos del grado: " . $conn->error;
         }
     } 
    // Cierra la conexión a la base de datos
    $conn->close();

    // Redirige de vuelta a la página principal
    header("Location: alumno.php");
    exit;
}
?>

