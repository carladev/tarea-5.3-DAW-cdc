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
                        <li><a class="nav" href="./jugadoresLista.php"><span>Jugadores</span></a></li>
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
        <div class="polaroids">
            <div class="polaroid">
                <a href="./jugadoresLista.php">
                    <img src="./assets/2.png" alt="Jugadores">
                    <span class="textoPolaroid">Jugadores</span>
                </a>
            </div>
            <div class="polaroid">
                <a href="./equiposLista.php">
                    <img src="./assets/1.png" alt="Equipos">
                    <span class="textoPolaroid">Equipos</span>
                </a>
            </div>
            <div class="polaroid">
                <a href="./categoriasLista.php">
                    <img src="./assets/4.png" alt="Categorias">
                    <span class="textoPolaroid">Categorias</span>
                </a>
            </div>
            <div class="polaroid">
                <a href="./usersLista.php">
                    <img src="./assets/3.png" alt="Usuarios">
                    <span class="textoPolaroid">Usuarios</span>
                </a>
            </div>
        </div>

    </div>
</body>

</html>