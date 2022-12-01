<?php
require_once "../connection.php";
$sql = "SELECT t.name as 'team_name',p.id,t.logo,p.name,p.last_name,p.picture,pos.name as 'position' FROM `players` as p INNER JOIN teams as t ON p.id_team = t.id INNER JOIN positions as pos on p.position_id=pos.id ORDER BY team_name";
$result = mysqli_query($conn, $sql);
$response = array();
$i = 0;
while ($row = mysqli_fetch_array($result)) {
  $response[$i]['id'] = $row['id'];
  $response[$i]['nombre_equipo'] = $row['team_name'];
  $response[$i]['nombre_jugador'] = $row['name'];
  $response[$i]['apellido_jugador'] = $row['last_name'];
  $response[$i]['posicion'] = $row['position'];


  $i++;
}
echo json_encode($response, JSON_PRETTY_PRINT);
