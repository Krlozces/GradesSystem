<?php
    include_once("../Config/conexion.php");

    include("../Modals/editarModal.php");
    include("../Modals/eliminarModal.php");

    $sex = $_POST['sex'];

    $sql = "SELECT ALUMDNI, NomAlumno, ApeAlumno, FechaNaci, Email FROM alumno INNER JOIN sexo ON alumno.sexo = sexo.IdSex WHERE EstEst = 0 AND sexo = '$sex'";

    $resultado = $conn ->query($sql);
    $num_rows = $resultado->num_rows;

    if($num_rows > 0){
        $output = "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>#Dni</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Apellidos</th>
                            <th scope='col'>Fecha de Nacimiento</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";

        while ($row = $resultado->fetch_assoc()) {
            $output .= "<tr>
                            <th scope='row'>" . $row['ALUMDNI'] . "</th>
                            <td>" . $row['NomAlumno'] . "</td>
                            <td>" . $row['ApeAlumno'] . "</td>
                            <td>" . $row['FechaNaci'] . "</td>
                            <td>" . $row['Email'] . "</td>
                            <td>
                                <a href='#' data-bs-id='" . $row['ALUMDNI']."' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editarModal'>Editar</a>
                                <a href='#' data-bs-id='" . $row['ALUMDNI'] . "' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#eliminarModal'>Eliminar</a>
                            </td>
                        </tr>";
        }

        $output .= "</tbody></table>";

        echo $output;
    }else{
        echo "Falta la tabla.";
    }
?>