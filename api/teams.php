<?php
require_once "../connection.php";
$sql = "SELECT g.name as 'group_name',t.id,t.name,t.gw,t.gd,t.gl,t.gf,t.gc,t.dg FROM `teams` as t INNER JOIN groups as g ON t.id_group = g.id ORDER BY group_name;";
$result = mysqli_query($conn, $sql);
$response = array();
$i = 0;
while ($row = mysqli_fetch_array($result)) {

  $response[$i]['id'] = $row['id'];
  $response[$i]['nombre_equipo'] = $row['name'];
  $response[$i]['nombre_grupo'] = $row['group_name'];
  $response[$i]['partidos_jugados'] = $row['gw'] + $row['gd'] + $row['gl'];
  $response[$i]['partidos_ganados'] = $row['gw'];
  $response[$i]['partidos_empatados'] = $row['gd'];
  $response[$i]['partidos_perdidos'] = $row['gl'];
  $response[$i]['goles_a_favor'] = $row['gf'];
  $response[$i]['goles_en_contra'] = $row['gc'];
  $response[$i]['diferencia_de_goles'] = $row['dg'];
  $response[$i]['puntos'] = $row['gw'] * 3 + $row['gd'];

  $i++;
}
echo json_encode($response, JSON_PRETTY_PRINT);
