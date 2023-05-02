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
                        <li><a class="nav" href="./equiposLista.php"><span>Equipos</span></a></li>
                        <li><a class="nav" href="./categoriasLista.php"><span>Categorias</span></a></li>
                        <li><a class="nav seleccionado" href="./usersLista.php"><span>Usuarios</span></a></li>
                    </ul>
                </nav>
                <div class="sesion">
                    <section class="logo">
                        <img class="small-icon" src="assets/sesion.svg" alt="Sisión Icono" />
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
        <a class='btn' href='./usersCrear.php'>Nuevo Usuario</a>


        <?php
        // Conexion con la base de datos más completa
        include 'conexionBD.php';
        $con = openCon();

        // Mostrar datos
        $resultado = $con->query('SELECT * FROM usuarios');

        echo '<table>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Usuario</th>';
        echo '</tr>';
        while ($row = $resultado->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['usuario'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        if (isset($_GET['exitoCreacion'])) {
            echo '<script type="text/javascript">';
            echo 'alert("Usuario creado con exito");';
            echo '</script>';
        }

        ?>
    </div>

</body>

</html>