<?php

/**
* Este archivo elimina una categoría.
* @param int $id El ID de la categoría a eliminar.
* @return void
* @access public
*/
include 'conexionBD.php';
$con = openCon();
$id = $_GET['id'];
$sql = "DELETE FROM categorias WHERE id='$id'";
$eliminar = $con->exec($sql);

header("location:categoriasLista.php?");