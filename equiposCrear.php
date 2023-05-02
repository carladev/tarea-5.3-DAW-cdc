<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<?php
include 'conexionBD.php';
$con = openCon();
?>

<body>
    <div class="container">

        <header class="header">
            <div class="wrapper">
                <section class="logo">
                    <a href="./menu.php"><img class="icon" src="assets/logo.svg" alt="Logo baloncesto" /></a>
                    <h1>Liga Tigers</h1>
                </section>

                <nav>
                    <ul>
                        <li><a class="nav" href="./jugadoresLista.php"><span>Jugadores</span></a></li>
                        <li><a class="nav seleccionado" href="./equiposLista.php"><span>Equipos</span></a></li>
                        <li><a class="nav" href="./categoriasLista.php"><span>Categorias</span></a></li>
                        <li><a class="nav" href="./usersLista.php"><span>Usuarios</span></a></li>
                    </ul>
                </nav>
                <div class="sesion">
                    <section class="logo">
                        <img class="small-icon" src="assets/sesion.svg" alt="Sesión Icono" />
                        <?php
                        session_start();
                        echo "<p>",  $_SESSION['usuario'], "</p></br>";
                        ?>
                    </section>
                    <a class="logout" href="logout.php">Cerrar Sesión</a>
                </div>
            </div>
        </header>
    </div>
    <div class="content">

        <div class="frm">
            <form class="form" name="imput" method="post" action="equiposCrear.php">
                <h4 class="title">Nuevo Equipo</h4>

                <div class="inputContainer">
                    <label class="label" for="nombre">Nombre equipo</label>
                    <input class="input" type="text" name="nombre">
                </div>

                <input class="submitBtn" type="submit" value="Crear Equipo" name="crearEquipo" />
            </form>
        </div>
    </div>

</body>

<?php

/**
* Este archivo crea un equipo.
* @param string $nombre El nombre del equipo a crear.
* @return void
* @access public
*/
if (isset($_POST['crearEquipo'])) {

    // Declaración Variables
    $nombre = $_POST['nombre'];

    $insertEquipo = "INSERT INTO equipos (equipo) VALUES ('$nombre')";
    $insertar = $con->exec($insertEquipo);
    $id = $con->lastInsertId();
    if ($id) {

        header("location:equiposLista.php?exitoCreacion='true'");
        exit;
    } else {

        header("Refresh:0");
    }
}

?>

</html>