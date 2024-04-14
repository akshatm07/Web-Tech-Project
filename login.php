<?php
// Check if the form is submitted
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost:3308"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "notes_organiser"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check user credentials
    $stmt = $conn->prepare("SELECT * FROM tb_userdetail WHERE reg_no = ? AND password = ?");
    $stmt->bind_param("ss", $regNumber, $password);

    $regNumber = $_POST['reg_number'];
    $password = $_POST['password'];

    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        // User found, redirect to index page or any other page you want
        $_SESSION['reg_no'] = $row['reg_no'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['year'] = $row['year'];
        header("Location: index.php");
        exit();
    } else {
        // User not found, show error message
        echo "<p style='color: red; text-align: center;'>Invalid registration number or password.</p>";
    }
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background: #333;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .signup-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Login(as a Student)</h2>
    <form action="" method="post">
        <label for="reg_number">Registration Number:</label>
        <input type="text" id="reg_number" name="reg_number" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
    <a href="registration.php" class="signup-link">Don't have an account? Sign up here.</a>
</div>
</body>
</html>
