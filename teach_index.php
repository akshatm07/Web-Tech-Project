<?php
session_start();

if (!isset($_SESSION['teacher_id'])) {
    header("location: intro.php");
    exit;
}

if (isset($_POST['logout'])) {
    $_SESSION = array();

    session_destroy();

    header("Location: intro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script>
    function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.account-button')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
function toggleDarkMode() {
        var body = document.getElementById("body");
        body.classList.toggle("dark-mode");
    }
    </script>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
.container {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    .upload-area {
    display: flex;
    justify-content: flex-start; 
    padding-left: 20px; 
    align-items: center;
    height: 50px;
    border-bottom: 2px solid #ccc;
}

.upload-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.upload-button i {
    margin-right: 5px; /* Add some space between the icon and text */
}
    .content {
        display: flex;
        flex: 1;
    }
    .notes {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
    }
    .vertical-divider {
        width: 5px;
        background-color: #ccc;
        margin: 0 20px; /* Adjust margin as needed */
    }
    .notes-table {
        width: 100%;
        border-collapse: collapse;
    }
    .notes-table td, .notes-table th {
        padding: 8px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    .notes-table th {
        background-color: #f2f2f2;
    }
header {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.options {
    display: flex;
    align-items: center;
}

/* Styling for dark mode toggle */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input { 
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
    background-color: #2196F3;
}

input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

/* Styling for account dropdown */
.account-dropdown {
    position: relative;
    display: inline-block;
    margin-left: 20px;
}

.account-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    font: inherit;
    color: #fff;
    display: flex;
    align-items: center;
}

.account-button:focus {
    outline: none;
}

.account-icon {
    font-size: 24px;
    margin-right: 5px;
}

/* Styling for account dropdown */
.account-dropdown {
    position: relative;
    display: inline-block;
    margin-left: 20px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    top: 50px; /* Adjust the top position as needed */
    right: 0; /* Align the dropdown to the right */
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.show {
    display: block;
}
/* Styling for table */
.table-container {
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}
.dark-mode header {
    background-color: #222;
    color: #fff;
}

.dark-mode .slider {
    background-color: #888;
}

.dark-mode .slider:before {
    background-color: #444;
}
.horizontal-divider {
            border-bottom: 1px solid black;
            margin-bottom: 10px;
        }

        .vertical-divider {
            border-left: 1px solid black;
            height: 100%;
            position: absolute;
            right: 0;
            top: 0;
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .popup-content {
            background-color: #fefefe;
            margin-left: 35%;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 400px;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Style the form */
        #noteForm {
            text-align: center;
        }

        #noteForm label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #noteForm input[type="text"],
        #noteForm select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #noteForm button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #noteForm button:hover {
            background-color: #0056b3;
        }

        #notes_heading {
            padding-left : 20px
        }
    </style>
</head>
<body id="body"> 
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $stmt = $conn->prepare("INSERT INTO tb_notes (title , link, teacher_id , year , subject , course_code) VALUES (?, ?, ?, ?, ? , ?)");
    $stmt->bind_param("ssiiss",$title, $link, $teacher_id, $year, $subject , $course_code);

    // Set parameters
    $title = $_POST['title'];
    $link = $_POST['link'];
    $teacher_id = $_SESSION['teacher_id'];
    $year = $_POST['year'];
    $subject = $_POST['subject'];
    $course_code = $_POST['course_code'];

    // Execute the prepared statement
    if ($stmt->execute() === TRUE) {        
    } else {
        echo "<script>showPopup('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
        $conn->close();
}
?>

<header>
        <div class="header-container">
            <h1>Notes Organiser</h1>
            <div class="options">
                <label class="switch">
                    <input type="checkbox" id="darkModeToggle" onclick="toggleDarkMode()">
                    <span class="slider round"></span>
                </label>
                <div class="account-dropdown" id="accountDropdown">
                <button class="account-button" onclick="toggleDropdown()">&#128100; Account</button>
                                    <div class="dropdown-content" id="dropdownContent">
                        <a href="#">Profile</a>
                        <form action="" method="post">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
    <div class="container">
    <div class="upload-area">
    <button class="upload-button" id="uploadBtn">
        <i class="fas fa-plus"></i> Upload Notes
    </button>
</div>
<h2 id="notes_heading">Your Notes</h2>
    <div class="content">
        <div class="notes">
        <?php 
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
        
        // SQL to fetch data
        $sql = "SELECT * FROM tb_notes WHERE teacher_id = '{$_SESSION['teacher_id']}';";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table class='notes-table'>";
            echo "<tr><th>Title</th><th>Subject</th><th>Course Code</th><th>Year</th><th>Link</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["title"]."</td><td>".$row["subject"]."</td><td>".$row["course_code"]."</td><td>".$row["year"]."</td>";
                echo "<td><a href='".$row["link"]."' target='_blank' >".$row["link"]."</a></td>"; // Wrap the link in <a> tags
            echo "</tr>";

            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
            ?>
        </div>
</div>
<div id="myModal" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2>Upload Notes</h2>
        <form id="noteForm" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="link">Link:</label><br>
            <input type="text" id="link" name="link"><br>
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject"><br>
            <label for="course_code">Course Code:</label><br>
            <input type="text" id="course_code" name="course_code"><br>
            <label for="year">Year:</label><br>
            <select id="year" name="year">
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
            </select><br><br>
            <input type="submit" class="upload-button" value="Register">
        </form>
    </div>
</div>
    </main>
    <script>
        function openPopup() {
            document.getElementById("myModal").style.display = "block";
        }

        function closePopup() {
            document.getElementById("myModal").style.display = "none";
        }

        // Event listener for the button to open the pop-up
        document.getElementById("uploadBtn").addEventListener("click", openPopup);
    </script>
</body>
</html>
