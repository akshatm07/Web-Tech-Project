<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script type="text/javascript">
        function showPopup(message) {
            var popup = document.getElementById("popup");
            popup.innerText = message;
            popup.style.display = "block";
            setTimeout(function() {
                popup.style.display = "none";
            }, 3000); // Hide the pop-up after 3 seconds
        }
    </script>
    <style>
        .popup {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f44336; /* Red background color */
            color: white;
            padding: 16px;
            border-radius: 5px;
            z-index: 999; /* Ensure the pop-up is above other elements */
            display: none; /* Initially hide the pop-up */
            width: 300px; /* Set the width of the pop-up */
            text-align: center;
        }
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
        input[type="email"],
        input[type="password"],
        select {
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
    </style>
</head>
<body>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script>showPopup('Password and confirm password do not match.')</script>";
        exit(); // Exit the script if passwords don't match
    }
    // Connect to the database
    $servername = "localhost:3308"; // Change this if your database is on a different server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "notes_organiser"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO tb_userdetail ( reg_no , name, email , year , password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi",$regNumber, $name, $email, $year, $password);

    // Set parameters
    $name = $_POST['name'];
    $email = $_POST['email'];
    $regNumber = $_POST['regNumber'];
    $password = $_POST['password'];
    $year = $_POST['year'];

    // Execute the prepared statement
    if ($stmt->execute() === TRUE) {
        // Redirect to login page after successful registration

        header("Location: login.php");
        exit();
    } else {
        echo "<script>showPopup('Error: " . $stmt->error . "');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="regNumber">Registration Number:</label><br>
            <input type="text" id="regNumber" name="regNumber" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <label for="year">Year:</label>
            <select id="year" name="year" required>
                <option value="">Select Year</option>
                <option value="1">First Year</option>
                <option value="2">Second Year</option>
                <option value="3">Third Year</option>
                <option value="4">Fourth Year</option>
            </select>
            <input type="submit" value="Register">
        </form>
        <br>
        <a href="login.php">Login</a>
    </div>
    <div id="popup" class="popup"></div>
</body>
</html>
