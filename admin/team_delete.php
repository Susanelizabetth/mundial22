<?php
require_once "../connection.php";
require_once "../classes/classes.php";
$teams =  new Teams;
$id = $_GET['id'];
if($teams->ifId($id)){
  $sql = "DELETE FROM teams WHERE id = $id";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    header("Location: teams.php");
  }
}