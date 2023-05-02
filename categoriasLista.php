<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="styles/styles.css">
</head>

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
                        <li><a class="nav " href="./jugadoresLista.php"><span>Jugadores</span></a></li>
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
        <a class='btn' href='./categoriasCrear.php'>Nueva Categoria</a>

<?php
/**
 * Muestra una tabla con los datos de todas las categorias en la base de datos.
 * 
 * @access public
 * @return void
 */

include 'conexionBD.php';
$con = openCon();


$resultado = $con->query('SELECT * FROM categorias');

/**
 * Muestra los datos de cada categoria en la tabla.
 * 
 * @access public
 * @param array $row Un arreglo que contiene los datos de una categoria.
 * @return void
 */
echo '<table>';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Categoria</th>';
echo '<th>Edad</th>';
echo '<th>Año Nacimiento</th>';
echo '<th></th>';
echo '</tr>';

while ($row = $resultado->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['categoria'] . '</td>';
    echo '<td>' . $row['edad'] . '</td>';
    echo '<td>' . $row['anoNacimiento'] . '</td>';

    echo '<td>';
    echo '<a class="delete" href="categoriasBorrar.php?id=' . $row['id'] . '"><span>Eliminar</span></a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

/**
 * Muestra un mensaje de exito si se ha creado una categoria nueva.
 * 
 * @access public
 * @return void
 */
if (isset($_GET['exitoCreacion'])) {
    echo '<script type="text/javascript">';
    echo 'alert("Categoria creada con exito");';
    echo '</script>';
}
?>
    </div>

</body>

</html>