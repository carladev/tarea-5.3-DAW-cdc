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
        <a class='btn' href='./jugadoresCrear.php'>Nuevo Jugador</a>


        <?php
/**
 * Muestra una tabla con los datos de todas los jugadores en la base de datos.
 * 
 * @access public
 * @return void
 */
        include 'conexionBD.php';
        $con = openCon();

        // Mostrar datos
        $resultado = $con->query('SELECT J.id, dni, nombre, apellidos, equipo, categoria FROM jugadores J 
                                     INNER JOIN equipos E ON E.id = J.equipoId 
                                     INNER JOIN categorias C ON C.id = J.categoriaId');

        
/**
 * Muestra los datos de cada jugador en la tabla.
 * 
 * @access public
 * @param array $row Un arreglo que contiene los datos de un jugador.
 * @return void
 */
        echo '<table>';
        echo '<tr>';
        echo '<th>DNI</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellidos</th>';
        echo '<th>Equipo</th>';
        echo '<th>Categoria</th>';
        echo '<th></th>';
        echo '</tr>';
        while ($row = $resultado->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['dni'] . '</td>';
            echo '<td>' . $row['nombre'] . '</td>';
            echo '<td>' . $row['apellidos'] . '</td>';
            echo '<td>' . $row['equipo'] . '</td>';
            echo '<td>' . $row['categoria'] . '</td>';

            echo '<td>';
            echo '<a class="delete" href="jugadoresBorrar.php?id=' . $row['id'] . '"><span>Eliminar</span></a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
                
 /**
 * Muestra un mensaje de exito si se ha creado un jugador nuevo.
 * 
 * @access public
 * @return void
 */
        if (isset($_GET['exitoCreacion'])) {
            echo '<script type="text/javascript">';
            echo 'alert("Jugador creado con exito");';
            echo '</script>';
        }

        ?>
    </div>

</body>

</html>