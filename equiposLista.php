<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Exportar cabecera desde cabecera.php -->
    <?php
    include 'cabecera.php';
    ?>


    <div class="content">
        <a class='btn' href='./equiposCrear.php'>Nuevo Equipo</a>


        <?php
/**
 * Muestra una tabla con los datos de todas los equipos en la base de datos.
 * 
 * @access public
 * @return void
 */
        include 'conexionBD.php';
        $con = openCon();

        // Mostrar datos
        $resultado = $con->query('SELECT * FROM equipos');

/**
 * Muestra los datos de cada equipo en la tabla.
 * 
 * @access public
 * @param array $row Un arreglo que contiene los datos de un equipo.
 * @return void
 */
        echo '<table>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Equipo</th>';
        echo '<th></th>';
        echo '</tr>';
        while ($row = $resultado->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['equipo'] . '</td>';

            echo '<td>';
            echo '<a class="delete" href="equiposBorrar.php?id=' . $row['id'] . '"><span>Eliminar</span></a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        
 /**
 * Muestra un mensaje de exito si se ha creado un equipo nuevo.
 * 
 * @access public
 * @return void
 */
        if (isset($_GET['exitoCreacion'])) {
            echo '<script type="text/javascript">';
            echo 'alert("Equipo creado con exito");';
            echo '</script>';
        }

        ?>
    </div>

</body>

</html>