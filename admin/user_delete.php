<?php
require_once "../connection.php";
require_once "../classes/classes.php";
$users =  new Users;

$id = $_GET['id'];

if ($users->ifId($id)) {
  $sql = "DELETE FROM users WHERE id = $id";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    header("Location: users.php");
  }
}
