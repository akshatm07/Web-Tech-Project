<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Organiser</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    max-width: 800px;
    margin: 100px auto;
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

p {
    color: #666;
    margin-bottom: 20px;
}

.options {
    display: flex;
    justify-content: center;
}

.login-button {
    display: inline-block;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 0 10px;
    transition: background-color 0.3s ease;
}

.login-button:hover {
    background-color: #2980b9;
}

        </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Notes Organiser</h1>
        <p>A collaborative platform for students and teachers to organize and share study materials.</p>
        <div class="options">
            <a href="login.php" class="login-button">Login as a Student</a>
            <a href="teach_login.php" class="login-button">Login as a Teacher</a>
        </div>
        <p>Created by Karan Singh and Akshat Mishra</p>
    </div>
</body>
</html>
