<?php
include_once("../Config/conexion.php");

$especialidad = $_POST['nota'];  // Obtener la especialidad desde el formulario

$sql = "SELECT ALUMDNI, NOTAORAL, NOTAESCRITA, EXAMEN, ROUND(((NOTAORAL + NOTAESCRITA + EXAMEN)/3), 2) AS Promedio, NomCurso FROM nota INNER JOIN curso ON nota.IdCurso = curso.IdCurso;";

$resultado = $conn->query($sql);

if ($resultado) {
    $output = "<table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>#Dni</th>
                        <th scope='col'>Nota Oral</th>
                        <th scope='col'>Nota Escrita</th>
                        <th scope='col'>Examen</th>
                        <th scope='col'>Curso</th>
                        <th scope='col'>Promedio</th>
                    </tr>
                </thead>
                <tbody>";

    while ($row = $resultado->fetch_assoc()) {
        $promedio = round(($row['NOTAORAL'] + $row['NOTAESCRITA'] + $row['EXAMEN']) / 3, 2);

        if ($promedio >= 14 && $especialidad == 'A') {
            $output .= "<tr>
                        <th scope='row'>" . $row['ALUMDNI'] . "</th>
                        <td>" . $row['NOTAORAL'] . "</td>
                        <td>" . $row['NOTAESCRITA'] . "</td>
                        <td>" . $row['EXAMEN'] . "</td>
                        <td>" . $row['NomCurso'] . "</td>
                        <td>" . $promedio . "</td>
                    </tr>";
        }
        elseif($promedio <= 14 && $especialidad == 'D'){
            $output .= "<tr>
                        <th scope='row'>" . $row['ALUMDNI'] . "</th>
                        <td>" . $row['NOTAORAL'] . "</td>
                        <td>" . $row['NOTAESCRITA'] . "</td>
                        <td>" . $row['EXAMEN'] . "</td>
                        <td>" . $row['NomCurso'] . "</td>
                        <td>" . $promedio . "</td>
                    </tr>";
        }
    }

    $output .= "</tbody></table>";
    echo $output;
} else {
    echo "Error en la consulta: " . $conn->error;
}
?>
