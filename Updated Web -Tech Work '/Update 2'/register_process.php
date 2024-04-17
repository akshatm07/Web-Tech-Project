<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $donate = "";
    $AddSug = "";

    $sql = "INSERT INTO user1 (username, email, password, donate, AddSug) VALUES ('$username', '$email', '$password', '$donate', '$AddSug')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

