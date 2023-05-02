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
                        <li><a class="nav seleccionado" href="./jugadoresLista.php"><span>Jugadores</span></a></li>
                        <li><a class="nav" href="./equiposLista.php"><span>Equipos</span></a></li>
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
            <form class="form" name="imput" method="post" action="jugadoresCrear.php">
                <h4 class="title">Nuevo Jugador</h4>
                <div class="inputContainer">
                    <label class="label" for="dni">DNI</label>
                    <input class="input" type="text" name="dni" required autofocus>
                </div>
                <div class="inputContainer">
                    <label class="label" for="nombre">Nombre</label>
                    <input class="input" type="text" name="nombre">
                </div>
                <div class="inputContainer">
                    <label class="label" for="apellidos">Apellidos</label>
                    <input class="input" type="text" name="apellidos">
                </div>

                <div class="inputContainer">
                    <select class="input" name="equipo" id="equipo">
                        <?php
                        $equipos = $con->query('SELECT * FROM equipos');
                        while ($equipo = $equipos->fetch()) {
                            echo '<option value="' . $equipo['id'] . '">' . $equipo['equipo'] . '</option>';
                        }
                        ?>

                    </select>
                </div>


                <div class="inputContainer">
                    <select class="input" name="categoria" id="categoria">
                        <?php
                        $categorias = $con->query('SELECT * FROM categorias');
                        while ($categoria = $categorias->fetch()) {
                            echo '<option value="' . $categoria['id'] . '">' . $categoria['categoria'] . '</option>';
                        }
                        ?>

                    </select>
                </div>


                <input class="submitBtn" type="submit" value="Crear Jugador" name="crearJugador" />
            </form>
        </div>
    </div>

</body>

<?php
/**
* Este archivo crea un jugador.
* @param string $dni El dni del jugador a crear.
* @param string $nombre El nombre del jugador a crear.
* @param string $apellidos El apellidos del jugador a crear.
* @param string $equipo El $equipo del jugador a crear.
* @param string $categoria El $categoria del jugador a crear.
* @return void
* @access public
*/

// Crear jugador
if (isset($_POST['crearJugador'])) {

    // Declaración Variables
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $equipo = $_POST['equipo'];
    $categoria = $_POST['categoria'];

    $insetJugador = "INSERT INTO jugadores (dni, nombre, apellidos, equipoId, categoriaId) VALUES ('$dni','$nombre','$apellidos','$equipo','$categoria' )";
    $insertar = $con->exec($insetJugador);
    $id = $con->lastInsertId();
    if ($id) {

        header("location:jugadoresLista.php?exitoCreacion='true'");
        exit;
    } else {

        header("Refresh:0");
    }
}

?>

</html>