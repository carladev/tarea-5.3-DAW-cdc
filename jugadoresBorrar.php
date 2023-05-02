<?php

/**
* Este archivo elimina un jugador.
* @param int $id El ID del jugador a eliminar.
* @return void
* @access public
*/

include 'conexionBD.php';
$con = openCon();

$id = $_GET['id'];
$sql = "DELETE FROM jugadores WHERE id='$id'";
$eliminar = $con->exec($sql);

header("location:jugadoresLista.php?");
