<?php
session_start();

// Incluir el archivo de conexión a la base de datos
include("Config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dnidoce = $_POST['dnidoce'];
    $nomdocente = $_POST['nomdocente'];
    $apedocente = $_POST['apedocente'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $nomEspecialidad = $_POST['especialidad'];

    // Verificar si ya existe un docente con el mismo DNI
    $verificarDNI = "SELECT * FROM Docente WHERE DNIDOCE = '$dnidoce'";
    $resultDNI = $conn->query($verificarDNI);

    if ($resultDNI->num_rows > 0) {
        // El DNI ya está en uso
        $_SESSION['error'] = "El  docente ya esta registrado en la base de datos.";
    } else {
        // El DNI no está en uso, proceder con la inserción
        $sql = "INSERT INTO Especialidad (NomEspecialidad) VALUES ('$nomEspecialidad')";
        if ($conn->query($sql) === TRUE) {
            $idEspecialidad = $conn->insert_id;

            $sql = "INSERT INTO Docente (DNIDOCE, NOMDocente, ApeDocente, Telefono, Email, IdEspecialidad)
                VALUES ('$dnidoce', '$nomdocente', '$apedocente', '$telefono', '$email', '$idEspecialidad')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = "Docente registrado con éxito.";
            } else {
                $_SESSION['error'] = "Error al registrar el docente: " . $conn->error;
            }
        } else {
            $_SESSION['error'] = "Error al registrar la especialidad: " . $conn->error;
        }
    }
}

// Cierra la conexión a la base de datos
$conn->close();

// Redirige de vuelta a la página principal
header("Location: profesor.php");
exit;
?>



75840464
78965412

