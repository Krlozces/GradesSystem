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
    </head>
    <body>
        <main>
            <div class="cotainer-md">
                <h1 class="text-center">CALIFICACIONES</h1>
            </div>
            <form action="CRUD/procesarFiltroNotas.php" method="post" id="filtroForm">
                <div class="container-md w-25">
                    <label for="nota">Especialidad:</label>
                    <select class="form-select" name="nota" id="nota">
                        <option selected >--- Estado ---</option>
                            <?php 
                                include ("Config/conexion.php");
                                echo '<option value="' . 'A' . '">' . 'Aprobado' . '</option>';
                                echo '<option value="' . 'D' . '">' . 'Desaprobado' . '</option>';
                            ?>
                    </select>          
                </div>
            </form>
            <div class="container">
                <table class="table" id="tablaResultados">
                    <thead>
                        <tr>
                        <th scope = "col">#Dni</th>
                        <th scope = "col">Nota Oral</th>
                        <th scope = "col">Nota Escrita</th>
                        <th scope = "col">Examen</th>
                        <th scope = "col">Curso</th>
                        <th scope = "col">Promedio</th> <!--agregado -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require ("./Config/conexion.php");

                            $sql = $conn -> query("
                                SELECT ALUMDNI, NOTAORAL, NOTAESCRITA, EXAMEN, NomCurso FROM nota INNER JOIN curso 
                                ON nota.IdCurso = curso.IdCurso;
                            ");

                            while($resultado = $sql -> fetch_assoc()){
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $resultado['ALUMDNI'] ?></th>
                                    <td><?php echo $resultado['NOTAORAL'] ?></td>
                                    <td><?php echo $resultado['NOTAESCRITA'] ?></td>
                                    <td><?php echo $resultado['EXAMEN'] ?></td>
                                    <td><?php echo $resultado['NomCurso'] ?></td>
                                    <td>
                                        <?php
                                            echo $promedio = round(($resultado['NOTAORAL'] + $resultado['NOTAESCRITA'] + $resultado['EXAMEN'])/3, 2);
                                        ?>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <a href="notas.php" class="btn btn-success">Regresar</a>
                </div>
            </div>
        </main>
        <script src="funciones.js" async defer></script>
    </body>
</html>