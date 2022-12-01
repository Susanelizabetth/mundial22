<?php
require_once "connection.php";
$id = $_GET['id'];
$return = $_GET['return'];
$sql = "DELETE FROM favorite WHERE id = $id";
$query = mysqli_query($conn, $sql);
if (!$query) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
  header("Location: $return");
}
