<?php

$servername = "localhost";
$port = "3308";
$username = "root";
$password = "";
$database = "notes_organiser";

$conn = mysqli_connect($servername, $username, $password, $database ,  $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
