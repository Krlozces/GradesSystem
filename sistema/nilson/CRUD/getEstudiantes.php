<?php
require '../Config/conexion.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT ALUMDNI, NomAlumno, ApeAlumno, FechaNaci, Email FROM alumno WHERE ALUMDNI = '$id'";
$resultado = $conn->query($sql);

if ($resultado) {
    $rows = $resultado->num_rows;
    $estudiante = [];

    if ($rows > 0) {
        $estudiante = $resultado->fetch_array();
        echo json_encode($estudiante, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['error' => 'No se encontró ningún estudiante con el ID proporcionado.'], JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode(['error' => 'Error en la consulta SQL.'], JSON_UNESCAPED_UNICODE);
}
?>
