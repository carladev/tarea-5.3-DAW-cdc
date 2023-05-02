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
                        <li><a class="nav " href="./equiposLista.php"><span>Equipos</span></a></li>
                        <li><a class="nav seleccionado" href="./categoriasLista.php"><span>Categorias</span></a></li>
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
            <form class="form" name="imput" method="post" action="categoriasCrear.php">
                <h4 class="title">Nueva Categoria</h4>

                <div class="inputContainer">
                    <label class="label" for="nombre">Nombre Categria</label>
                    <input class="input" type="text" name="nombre">
                </div>

                <div class="inputContainer">
                    <label class="label" for="edad">Edad</label>
                    <input class="input" type="number" name="edad">
                </div>

                <div class="inputContainer">
                    <label class="label" for="anoNacimiento">Año Nacimiento</label>
                    <input class="input" type="number" name="anoNacimiento">
                </div>

                <input class="submitBtn" type="submit" value="Crear Categoria" name="crearCategoria" />
            </form>
        </div>
    </div>

</body>

<?php
/**
* Este archivo crea una categoría.
* @param string $nombre El Nombre de la categoría.
* @param int $edad La Edad de los jugadores de la categoría.
* @param int $anoNacimiento El año de nacimiento de los jugadores de la categoría.
* @return void
* @access public
*/

// Crear categoria
if (isset($_POST['crearCategoria'])) {

    // Declaración Variables
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $anoNacimiento = $_POST['anoNacimiento'];

    $insertCategoria = "INSERT INTO categorias (categoria, edad, anoNacimiento) VALUES ('$nombre', ' $edad', '$anoNacimiento' )";
    $insertar = $con->exec($insertCategoria);
    $id = $con->lastInsertId();
    if ($id) {

        header("location:categoriasLista.php?exitoCreacion='true'");
        exit;
    } else {

        header("Refresh:0");
    }
}

?>

</html>