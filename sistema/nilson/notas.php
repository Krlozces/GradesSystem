<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Docente</title>
    <link rel="stylesheet" type="text/css" href="estilonota.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Controlador/funci.js" ></script>
</head>
<body>


<div class="texto">
        <h1>Registro de Notas</h1>
    </div>

    <?php
        session_start();
        include "nav.php";
        // Mostrar mensajes de éxito o error
        if (isset($_SESSION['success'])) {
            echo "<div class='success'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']); // Limpiar el mensaje de éxito
        }

        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']); // Limpiar el mensaje de error
        }
    ?>

        <section class="almacenar">
            <div class="conteiner">
                <div class="imagen">
                    <img src="imagen/notas.png" alt="Imagen de ejemplo">
                </div>

                <form method="POST" action="guardarnotas.php" autocomplete="off">
                    <div class="parte1">
                        <div class="campo">
                        <label for="ALUMDNI">Seleccionar Alumno:
                            <select id="ALUMDNI" name="ALUMDNI" required>
                                <option value="">Seleccione un alumno</option></label>
                                <?php
                                // Incluir el archivo de conexión a la base de datos
                                include("Config/conexion.php");

                                // Consulta SQL para obtener la lista de alumnos
                                $sql = "SELECT ALUMDNI, NomAlumno, ApeAlumno FROM Alumno";

                                // Ejecutar la consulta
                                $resultado = $conn->query($sql);

                                // Recorrer los resultados y generar las opciones del select
                                while ($row = $resultado->fetch_assoc()) {
                                    echo '<option value="' . $row['ALUMDNI'] . '">' . $row['NomAlumno'] . ' ' . $row['ApeAlumno'] . '</option>';
                                }

                                // Cerrar la conexión a la base de datos
                                $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="IdCurso">Seleccionar Curso:
                            <select id="IdCurso" name="IdCurso" required></label>
                                <option value="">Seleccione un curso</option>
                                <?php
                                // Incluir el archivo de conexión a la base de datos
                                include("Config/conexion.php");

                                // Consulta SQL para obtener la lista de cursos
                                $sql = "SELECT IdCurso, NomCurso FROM Curso";

                                // Ejecutar la consulta
                                $resultado = $conn->query($sql);

                                // Recorrer los resultados y generar las opciones del select
                                while ($row = $resultado->fetch_assoc()) {
                                    echo '<option value="' . $row['IdCurso'] . '">' . $row['NomCurso'] . '</option>';
                                }

                                // Cerrar la conexión a la base de datos
                                $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="parte1">
                        <div class="campo">

                        <label for="NOTAORAL">Nota Oral:
                        <input type="number" id="NOTAORAL" name="NOTAORAL" required oninput="validarNota(this)">
                            </label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="NOTAESCRITA">Nota Escrita:
                        <input type="number" id="NOTAESCRITA" name="NOTAESCRITA" required oninput="validarNota(this)">
                            </label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="EXAMEN">Examen:
                        <input type="number" id="EXAMEN" name="EXAMEN" required oninput="validarNota(this)">
                            </label>
                        </div>
                    </div>

                    <div class="boton-container">
                        <div class="boton1">
                            <input type="submit" value="Guardar">
                        </div>

                        <div class="boton2">
                            <a href="tableCalificaciones.php"><button type="button">Lista </button></a>
                        </div>

                        <div class="boton3">
                            <a href="pagina_tres.php"><button type="button">Siguiente</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
</body>
</html>


