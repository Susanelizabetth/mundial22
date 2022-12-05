<?php
require_once "../connection.php";
require_once "../classes/classes.php";
$players =  new Players;
$id = $_GET['id'];

if ($players->ifId($id)) {
  $sql = "DELETE FROM players WHERE id = $id";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    header("Location: players.php");
  }
}