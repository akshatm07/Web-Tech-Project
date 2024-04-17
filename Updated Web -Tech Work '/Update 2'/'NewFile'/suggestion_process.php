<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suggestion = $_POST["suggestion"];
    $username = $_SESSION["username"];

    $sql = "UPDATE user1 SET AddSug='$suggestion' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        header("Location: Test.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
