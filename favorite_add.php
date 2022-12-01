<?php
session_start();
require_once "connection.php";
$id = $_GET['id'];
$return = $_GET['return'];
$sql = "INSERT INTO favorite (id_user,id_team) VALUES ('" . $_SESSION['id'] . "','$id');";
$query = mysqli_query($conn, $sql);
if (!$query) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
  header("Location: $return");
}
