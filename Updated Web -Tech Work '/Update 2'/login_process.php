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

// Login process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user1 WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: Test.html");
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
