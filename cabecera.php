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