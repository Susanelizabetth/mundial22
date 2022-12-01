<?php
$servername = "localhost";
$database = "mundial2022";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// INSERT INTO `usuario` (`id`, `name`, `last_name`, `username`, `password`, `type`) VALUES (NULL, 'Susana', 'Castillo', 'susane', '123456', '1');