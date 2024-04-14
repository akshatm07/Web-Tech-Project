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
    $stmt = $conn->prepare("SELECT * FROM tb_teacherdetail WHERE teacher_id = ? AND password = ?");
    $stmt->bind_param("ss", $teacher_id, $password);

    // Set parameters
    $teacher_id = $_POST['teacher_id'];
    $password = $_POST['password'];

    // Execute the prepared statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists in the database
    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        // User found, redirect to index page or any other page you want
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['teacher_name'] = $row['name'];
        header("Location: teach_index.php");
        exit();
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid Teacher ID or password.</p>";
    }
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
    <h2>Login(as a teacher)</h2>
    <form action="" method="post">
        <label for="reg_number">Teacher ID:</label>
        <input type="text" id="teacher_id" name="teacher_id" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
