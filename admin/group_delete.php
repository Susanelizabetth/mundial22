<?php
require_once "../connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM groups WHERE id = $id";
$query = mysqli_query($conn, $sql);
if (!$query) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
  header("Location: groups.php");
}
