<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Editar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1 class="text-center">Editar Datos</h1>
        <div class="container-md w-25">
            <form action="../CRUD/editarDatos.php" method="post" autofocus="off">
                <?php
                    include_once("../Config/conexion.php");
                    $sql = "SELECT * FROM docente WHERE DNIDOCE =". $_REQUEST['Id'];
                    $resultado = $conn->query($sql);

                    $row = $resultado->fetch_assoc();
                ?>

                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['DNIDOCE']; ?>">

                <div class="mb-3">
                    <label for="dni" class="form-label">Dni:</label>
                    <input type="text" class="form-control" id="dni" name="dni" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode>57)event.returnValue = false;" value="<?php echo $row['DNIDOCE']; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombres:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['NOMDocente']; ?>">
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row['ApeDocente']; ?>">
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="tel" name="tel" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode>57)event.returnValue = false;" value="<?php echo $row['Telefono']; ?>">
                </div>

                <div class="mb-3">
                    <label for="esp">Especialidad:</label>
                    <select class="form-select" name="especialidad" id="esp">
                        <option selected disabled>--- Especialidad ---</option>
                        <?php 
                            include ("../Config/conexion.php");
                            $sql1 = "SELECT * FROM docente INNER JOIN especialidad on docente.IdEspecialidad = especialidad.IdEspecialidad WHERE DNIDOCE=".$_REQUEST['Id'];
                            $resultado1 = $conn ->query($sql1);
                            $row1 = $resultado1->fetch_assoc();

                            echo "<option selected value='".$row1['IdEspecialidad']."'>".$row1['NomEsp']."</option>";

                            $sql = $conn -> query("SELECT * FROM especialidad");
                            while($resultado = $sql -> fetch_assoc()){
                                echo "<option value='".$resultado['IdEspecialidad']."'>".$resultado['NomEspecialidad']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary mx-2">Editar</button>
                    <a href="../lis_docentes.php" class="btn btn-outline-primary mx-2">Regresar</a>
                </div>
            </form>
        </div>
        <script src="" async defer></script>
    </body>
</html>