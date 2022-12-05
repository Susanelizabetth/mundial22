<?php
require_once "../connection.php";
require_once "../classes/classes.php";
$games = new Games();
$id = $_GET['id'];

if($games->ifId($id)){
    $sql = "DELETE FROM games WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        header("Location: games.php");
    }
}

