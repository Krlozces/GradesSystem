<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tabla</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <main>
            <div class="cotainer-md">
                <h1 class="text-center">LISTADO DE ESTUDIANTES</h1>
            </div>
            <form action="./CRUD/procesarFiltroSex.php" method="post" id="filtroForm">
                <div class="container-md w-25">
                    <label for="sex">Sexo:</label>
                    <select class="form-select" name="sex" id="sex">
                        <option selected >--- Sexo ---</option>
                            <?php 
                                include ("Config/conexion.php");
                                $sql = $conn -> query("SELECT * FROM sexo");
                                while($resultado = $sql -> fetch_assoc()){
                                    echo "<option value='".$resultado['IdSex']."'>".$resultado['DesSex']."</option>";
                                }
                            ?>
                    </select>          
                </div>
            </form>
            <div class="container">
                <table class="table" id="tablaResults">
                    <thead>
                        <tr>
                        <th scope = "col">#Dni</th>
                        <th scope = "col">Nombre</th>
                        <th scope = "col">Apellidos</th>
                        <th scope = "col">Fecha de Nacimiento</th>
                        <th scope = "col">Email</th>
                        <th scope = "col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require ("./Config/conexion.php");

                            $sql = $conn -> query("SELECT ALUMDNI, NomAlumno, ApeAlumno, FechaNaci, Email FROM alumno WHERE EstEst = 0;");

                            while($resultado = $sql -> fetch_assoc()){
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $resultado['ALUMDNI'] ?></th>
                                    <td><?php echo $resultado['NomAlumno'] ?></td>
                                    <td><?php echo $resultado['ApeAlumno'] ?></td>
                                    <td><?php echo $resultado['FechaNaci'] ?></td>
                                    <td><?php echo $resultado['Email'] ?></td>
                                    <td>
                                        <a href="#" data-bs-id="<?php echo $resultado['ALUMDNI']; ?>" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</a>
                                        <a herf="#" data-bs-id="<?php echo $resultado['ALUMDNI']; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="container d-flex justify-content-around">
                    <a href="index.php" class="btn btn-warning">Regresar</a>
                    <a href="./Formularios/agregar.php" class="btn btn-success">Agregar Estudiantes</a>
                </div>
            </div>
        </main>

        <?php include 'Modals/editarModal.php';?>
        <?php include 'Modals/eliminarModal.php';?>

        <script src="funciones.js" async defer></script>
    </body>
</html>