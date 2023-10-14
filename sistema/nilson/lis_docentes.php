<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tabla</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./scss/tables.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <main>
            <div class="cotainer-md">
                <h1 class="text-center">LISTADO DE DOCENTES</h1>
            </div>
            <form action="" method="post" id="filtroForm">
                <div class="container-md w-25">
                    <label for="esp">Especialidad:</label>
                    <select class="form-select" name="especialidad" id="esp">
                        <option selected >--- Especialidad ---</option>
                            <?php 
                                include ("Config/conexion.php");
                                $sql = $conn -> query("SELECT * FROM especialidad");
                                while($resultado = $sql -> fetch_assoc()){
                                    echo "<option value='".$resultado['IdEspecialidad']."'>".$resultado['NomEspecialidad']."</option>";
                                }
                            ?>
                    </select>          
                </div>
            </form>
            <div class="container">
                <table class="table table-hover" id="tablaResultados">
                    <thead>
                        <tr>
                        <th scope = "col">#Dni</th>
                        <th scope = "col">Nombre</th>
                        <th scope = "col">Apellidos</th>
                        <th scope = "col">Telefono</th>
                        <th scope = "col">Especialidad</th>
                        <th scope = "col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require ("./Config/conexion.php");

                            $sql = $conn -> query("
                                SELECT DNIDOCE, NOMDocente, ApeDocente, Telefono, NomEspecialidad FROM docente INNER JOIN especialidad 
                                ON docente.IdEspecialidad = especialidad.IdEspecialidad WHERE EstDocente = 0;
                            ");

                            while($resultado = $sql -> fetch_assoc()){
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $resultado['DNIDOCE'] ?></th>
                                    <td><?php echo $resultado['NOMDocente'] ?></td>
                                    <td><?php echo $resultado['ApeDocente'] ?></td>
                                    <td><?php echo $resultado['Telefono'] ?></td>
                                    <td><?php echo $resultado['NomEspecialidad'] ?></td>
                                    <td>
                                        <a href="Formularios/editarForm.php?Id=<?php echo $resultado['DNIDOCE'] ?>" class="btn btn-warning">Editar</a>
                                        <a href="CRUD/eliminarDatosDoc.php?Id=<?php echo $resultado['DNIDOCE'] ?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="container d-flex justify-content-around">
                    <a href="./Formularios/agregar.php" class="btn btn-success">Agregar Docentes</a>
                    <a href="tableEstudiantes.php" class="btn btn-warning">Siguiente</a>
                </div>
            </div>
        </main>
        <script src="funciones.js" async defer></script>
    </body>
</html>