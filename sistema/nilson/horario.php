<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Docente</title>
    <link rel="stylesheet" type="text/css" href="estilonota.css">
    <script src="Controlador/funciones.js" ></script>

</head>
<body>


<div class="texto">
        <h1>Registro de Horario</h1>
    </div>

    <?php
        session_start();

        // Mostrar mensajes de éxito o error
        if (isset($_SESSION['success'])) {
            echo "<div class='success'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']); // Limpiar el mensaje de éxito
        }

        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']); // Limpiar el mensaje de error
        }
        include("nav.php");
    ?>

        <section class="almacenar">
            <div class="conteiner">
                <div class="imagen">
                    <img src="imagen/hora.jpg" alt="Imagen de ejemplo">
                </div>

                <form method="POST" action="guardarhora.php" autocomplete="off">

                <div class="parte1">
                        <div class="campo">
                        <label for="dniDocente">Docente:
                        <select id="dniDocente" name="dniDocente" required></label>
                        <option value="">Seleccione un profesor</option>
                        <?php
                        // Incluir el archivo de conexión a la base de datos
                        include("Config/conexion.php");

                        // Consulta SQL para obtener la lista de profesores con sus nombres, apellidos y especialidades
                        $sql = "SELECT DNIDOCE, NOMDocente, ApeDocente, NomEspecialidad
                                FROM Docente D
                                INNER JOIN Especialidad E ON D.IdEspecialidad = E.IdEspecialidad";

                        // Ejecutar la consulta
                        $resultado = $conn->query($sql);

                        // Recorrer los resultados y generar las opciones del select
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<option value="' . $row['DNIDOCE'] . '">' . $row['NOMDocente'] . ' ' . $row['ApeDocente'] . ' (Especialidad: ' . $row['NomEspecialidad'] . ')</option>';
                        }

                        // Cerrar la conexión a la base de datos
                        $conn->close();
                        ?>
                        </select>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="idGrado">Grado:
                        <select id="idGrado" name="idGrado" required></label>
                            <option value="">Seleccione un grado</option>
                            <?php
                            // Incluir el archivo de conexión a la base de datos
                            include("Config/conexion.php");

                            // Consulta SQL para obtener la lista de grados
                            $sql = "SELECT IdGrado, NomGrado FROM Grado";

                            // Ejecutar la consulta
                            $resultado = $conn->query($sql);

                            // Recorrer los resultados y generar las opciones del select
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="' . $row['IdGrado'] . '">' . $row['NomGrado'] . '</option>';
                            }

                            // Cerrar la conexión a la base de datos
                            $conn->close();
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="horaInicio">Hora de Inicio:
                        <input type="time" id="horaInicio" name="horaInicio" required></label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="horaFinal">Hora Final:
                        <input type="time" id="horaFinal" name="horaFinal" required></label>
                        </div>
                    </div>


                    <div class="parte1">
                        <div class="campo">
                        <label for="dia">Día de la semana:
                        <select id="dia" name="dia" required></label>
                            <option value="" disabled selected>Seleccione un día</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                        </select>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="nomCompetencia">Nombre de la Competencia:
                         <input type="text" id="nomCompetencia" name="nomCompetencia" required></label>
                          
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="nomCurso">Nombre del Curso:
                        <input type="text" id="nomCurso" name="nomCurso" required></label>
                            
                        </div>
                    </div>

                    <div class="boton-container">
                        <div class="boton1">
                            <input type="submit" value="Guardar">
                        </div>

                        <div class="boton2">
                            <a href="otra_pagina.php"><button type="button">Lista </button></a>
                        </div>

                    </div>
                </form>
            </div>
        </section>
</body>
</html>


