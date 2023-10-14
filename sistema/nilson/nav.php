<link rel="stylesheet" type="text/css" href="style.css">
<nav class="navbar">
<img src="http://localhost/asistencia1/sistema/nilson/img/icono6.png" draggable="false" alt="" class="logo">
<hr style="background: black; height:2px; width:100%" >
<br>
    <ul class="opciones">
        <li class="botones">
            <img src="http://localhost/asistencia1/sistema/nilson/img/icono3.png" alt="" class="icono">
            <a href="profesor.php" class="btn">PROFESORES</a></li>
        <li class="botones">
            <img src="http://localhost/asistencia1/sistema/nilson/img/icono1.png" alt="" class="icono">
            <a href="horario.php" class="btn">HORARIO</a></li>
        <li class="botones">
            <img src="http://localhost/asistencia1/sistema/nilson/img/icono4.png" alt="" class="icono">
            <a href="alumno.php" class="btn">ESTUDIANTES</a></li>
        <li class="botones">
            <img src="http://localhost/asistencia1/sistema/nilson/img/icono8.png" alt="" class="icono">
            <a href="notas.php" class="btn">CALIFICACIONES</a></li>
        <li class="botones">
            <img src="http://localhost/asistencia1/sistema/nilson/img/icono7.png" alt="" class="icono">
            <a href="" class="btn">NUEVO REGISTRO</a>
        </li>
        <li class="botones">
            <img src="http://localhost/asistencia1/sistema/nilson/img/icono5.png" alt="" class="icono">
            <a href="cerrar.php" class="btn">SALIR</a>
        </li>
    </ul>
    
</nav>

<?php if ($_SESSION['tipo'] =5) { ?>

    <?php } ?> 