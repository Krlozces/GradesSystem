<?php

include("Config/conexion.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $dniDocente = $_POST['dniDocente'];
    $idGrado = $_POST['idGrado'];
    $horaInicio = $_POST['horaInicio'];
    $horaFinal = $_POST['horaFinal'];
    $dia = $_POST['dia'];
    $nomCompetencia = $_POST['nomCompetencia'];
    $nomCurso = $_POST['nomCurso'];

    // Verificar si el nombre de la competencia ya existe
    $sqlVerificarCompetencia = "SELECT IdCompetencia FROM competencia WHERE NomCompetencia = '$nomCompetencia'";
    $resultadoCompetencia = $conn->query($sqlVerificarCompetencia);

    if ($resultadoCompetencia->num_rows == 0) {
        // El nombre de la competencia no existe, lo insertamos
        $sqlCompetencia = "INSERT INTO competencia (NomCompetencia) VALUES ('$nomCompetencia')";
        if ($conn->query($sqlCompetencia)) {
            $_SESSION['success'] = "La competencia se ha insertado con éxito.";
        } else {
            $_SESSION['error'] = "Error al insertar la competencia: " . $conn->error;
        }
    }

    // Verificar si el nombre del curso ya existe
    $sqlVerificarCurso = "SELECT IdCurso FROM curso WHERE NomCurso = '$nomCurso'";
    $resultadoCurso = $conn->query($sqlVerificarCurso);

    if ($resultadoCurso->num_rows == 0) {
        // El nombre del curso no existe, lo insertamos
        $sqlCurso = "INSERT INTO curso (NomCurso, IdCompetencia, IdGrado) VALUES ('$nomCurso', (SELECT IdCompetencia FROM Competencia WHERE NomCompetencia = '$nomCompetencia' LIMIT 1), $idGrado)";
        if ($conn->query($sqlCurso)) {
            $_SESSION['success'] = "El curso se ha insertado con éxito.";
        } else {
            $_SESSION['error'] = "Error al insertar el curso: " . $conn->error;
        }
    }

    // Obtener la ID del Curso
    $sqlObtenerIdCurso = "SELECT IdCurso FROM curso WHERE NomCurso = '$nomCurso' LIMIT 1";
    $resultadoIdCurso = $conn->query($sqlObtenerIdCurso);
    $filaIdCurso = $resultadoIdCurso->fetch_assoc();
    $idCurso = $filaIdCurso['IdCurso'];

    // Realizar la inserción del horario
    $sqlHorario = "INSERT INTO horario (HoraInicio, HoraFinal, DIA, IdCurso, DNIDOCE) VALUES ('$horaInicio', '$horaFinal', '$dia', $idCurso, '$dniDocente')";
    if ($conn->query($sqlHorario)) {
        $_SESSION['success'] = "Los datos se han registrado con éxito.";
    } else {
        $_SESSION['error'] = "Error al registrar los datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Redirigir a la página actual (donde está el formulario)
    header("Location: horario.php");
}
?>


