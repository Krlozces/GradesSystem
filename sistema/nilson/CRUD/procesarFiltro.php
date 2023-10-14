<?php
    include_once("../Config/conexion.php");

    $especialidad = $_POST['especialidad'];  // Obtener la especialidad desde el formulario

    $sql = "SELECT DNIDOCE, NOMDocente, ApeDocente, Telefono, NomEspecialidad FROM docente INNER JOIN especialidad ON docente.IdEspecialidad = especialidad.IdEspecialidad WHERE EstDocente = 0 AND docente.IdEspecialidad = '$especialidad'";

    $resultado = $conn ->query($sql);
    $num_rows = $resultado->num_rows;
    
    if($num_rows > 0){
        $output = "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>#Dni</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Apellidos</th>
                            <th scope='col'>Teléfono</th>
                            <th scope='col'>Especialidad</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";

        while ($row = $resultado->fetch_assoc()) {
            $output .= "<tr>
                            <th scope='row'>" . $row['DNIDOCE'] . "</th>
                            <td>" . $row['NOMDocente'] . "</td>
                            <td>" . $row['ApeDocente'] . "</td>
                            <td>" . $row['Telefono'] . "</td>
                            <td>" . $row['NomEspecialidad'] . "</td>
                            <td>
                                <a href='Formularios/editarForm.php?Id=" . $row['DNIDOCE'] . "' class='btn btn-warning'>Editar</a>
                                <a href='CRUD/eliminarDatos.php?Id=" . $row['DNIDOCE'] . "' class='btn btn-danger'>Eliminar</a>
                            </td>
                        </tr>";
        }

        $output .= "</tbody></table>";

        echo $output;
    }else{
        
    }
?>
