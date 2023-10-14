<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Iniciar o continuar la sesión
session_start();

// Obtener los datos del formulario
$notaOral = $_POST['NOTAORAL'];
$notaEscrita = $_POST['NOTAESCRITA'];
$examen = $_POST['EXAMEN'];
$alumDNI = $_POST['ALUMDNI'];
$idCurso = $_POST['IdCurso'];

// Validación de datos (puedes agregar más validaciones según tus necesidades)

// Consulta SQL para verificar si ya existe una nota con el mismo DNI del alumno e ID del curso
$verificarDuplicado = "SELECT * FROM Nota WHERE ALUMDNI = '$alumDNI' AND IdCurso = '$idCurso'";
$resultadoVerificacion = $conn->query($verificarDuplicado);

if ($resultadoVerificacion->num_rows > 0) {
    // Si hay resultados, significa que ya existe una nota para ese alumno y curso
    $_SESSION['error'] = "El alumno ya tiene una nota registrada para este curso.";
} else {
    // Si no hay resultados, procedemos a insertar la nueva nota
    // Consulta SQL para insertar los datos en la tabla Nota
    $sql = "INSERT INTO Nota (NOTAORAL, NOTAESCRITA, EXAMEN, ALUMDNI, IdCurso) VALUES ('$notaOral', '$notaEscrita', '$examen', '$alumDNI', '$idCurso')";

    if ($conn->query($sql) === TRUE) {
        // Inserción exitosa
        $_SESSION['success'] = "Nota registrada con éxito.";
    } else {
        // Error en la inserción
        $_SESSION['error'] = "Error al registrar la nota: " . $conn->error;
    }
}

$conn->close();

// Redirigir a una página de confirmación o manejar cualquier otro flujo de la aplicación
header("Location: notas.php");
?>
