<?php
require_once "../connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";
$query = mysqli_query($conn, $sql);
if (!$query) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
  header("Location: users.php");
}
