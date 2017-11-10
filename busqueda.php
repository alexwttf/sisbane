<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');
require_once 'include/conexion.php';
function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  $query = "SELECT baneados.id_facebook, baneados.fecha_ban, baneados.ban_anterior, baneados.causa, usuario.id_usuario ,usuario.usuario FROM baneados INNER join usuario ON usuario.id_usuario = baneados.id_usuario
	WHERE id_facebook = '$search' ";
  $res = $mysqli->query($query);
while ($row = $res->fetch_array(MYSQLI_ASSOC)) { 

    echo "<p>Ups!! al parecer estas en la lista del PERMABAN</p>"; 
    echo "<p>Tu usuario de facebook es: $row[id_facebook]</p>"; 
	echo "<p>Causa del ban: $row[causa]</p>"; 
	echo "<p>Fecha del Baneo: $row[fecha_ban]</p>"; 
	echo "<p>Has tenido ban anteriormente: $row[ban_anterior]</p>"; 
	echo "<p>Te baneo el amdin/mod: $row[usuario]</p>"; 
	echo "<img src='img/holktriste.png' width='240' heigth='240'> </img>"; 
}

}
search();
?>