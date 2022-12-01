<?php
require_once "../connection.php";
$id = $_GET['id'];
$sql = "SELECT t.name as 'team_name',p.id,t.logo,p.name,p.last_name,p.picture,pos.name as 'position' FROM `players` as p INNER JOIN teams as t ON p.id_team = t.id INNER JOIN positions as pos on p.position_id=pos.id WHERE p.id='$id'";
$result = mysqli_query($conn, $sql);
$response = array();
$row = mysqli_fetch_array($result);

$response['id'] = $row['id'];
$response['nombre_equipo'] = $row['team_name'];
$response['nombre_jugador'] = $row['name'];
$response['apellido_jugador'] = $row['last_name'];
$response['posicion'] = $row['position'];


echo json_encode($response, JSON_PRETTY_PRINT);
