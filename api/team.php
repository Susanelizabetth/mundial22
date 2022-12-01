<?php
require_once "../connection.php";
$id = $_GET['id'];
$sql = "SELECT g.name as 'group_name',t.id,t.logo,t.name,t.gw,t.gd,t.gl,t.gf,t.gc,t.dg FROM `teams` as t INNER JOIN groups as g ON t.id_group = g.id WHERE t.id='$id'";
$result = mysqli_query($conn, $sql);
$response = array();
$row = mysqli_fetch_array($result);


$response['id'] = $row['id'];
$response['nombre_equipo'] = $row['name'];
$response['nombre_grupo'] = $row['group_name'];
$response['partidos_jugados'] = $row['gw'] + $row['gd'] + $row['gl'];
$response['partidos_ganados'] = $row['gw'];
$response['partidos_empatados'] = $row['gd'];
$response['partidos_perdidos'] = $row['gl'];
$response['goles_a_favor'] = $row['gf'];
$response['goles_en_contra'] = $row['gc'];
$response['diferencia_de_goles'] = $row['dg'];
$response['puntos'] = $row['gw'] * 3 + $row['gd'];

echo json_encode($response, JSON_PRETTY_PRINT);
