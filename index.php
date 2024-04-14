<?php
session_start();

if (!isset($_SESSION['reg_no'])) {
    header("location: login.php");
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
    border-radius: 10px; /* Add rounded borders */
    overflow: hidden; /* Hide overflow to prevent border radius clipping */
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px; /* Increase padding for better spacing */
    text-align: left;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold; /* Make the header text bold */
}

/* Add hover effect */
table tr:hover {
    background-color: #f5f5f5; /* Light gray background on hover */
}

/* Add transition for smoother hover effect */
table tr:hover td {
    transition: background-color 0.3s ease;
}

/* Add border-radius to table cells */
table th:first-child,
table td:first-child {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

table th:last-child,
table td:last-child {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}
.dark-mode header {
    background-color: #222;
    color: #fff;
    border-bottom: 2px solid #555; /* Add border bottom for header */
    padding: 15px 20px; /* Increase padding for better spacing */
}

/* Dark mode toggle button */
.dark-mode .slider {
    background-color: #555; /* Darker background for the slider */
}

/* Dark mode toggle button indicator */
.dark-mode .slider:before {
    background-color: #888; /* Darker color for the toggle indicator */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Add a subtle shadow */
}

/* Styling for account dropdown in dark mode */
.dark-mode .dropdown-content {
    background-color: #333; /* Darker background color */
    border: 1px solid #555; /* Add border for dropdown */
}

/* Hover effect for dropdown items in dark mode */
.dark-mode .dropdown-content a:hover {
    background-color: #444; /* Darker hover background color */
}

/* Styling for the close button in dark mode */
.dark-mode .close {
    color: #ccc; /* Lighter color for the close button */
}

.dark-mode .close:hover,
.dark-mode .close:focus {
    color: #fff; 
}
.dark-mode #body {
    background-color: #333; 
    color: #ddd; 
}

/* Dark mode styles for table */
.dark-mode table {
    border-color: #444; /* Darker border color for the table */
}

/* Dark mode styles for table headers */
.dark-mode table th {
    background-color: #222; /* Darker background color for table headers */
    color: #ddd; /* Light text color for table headers */
}

/* Dark mode styles for table cells */
.dark-mode table td {
    background-color: #444; /* Darker background color for table cells */
    color: #ddd; /* Light text color for table cells */
}

/* Dark mode styles for dropdown items */
.dark-mode .dropdown-content a {
    color: #ddd; /* Light text color for dropdown items */
}

.dark-mode .dropdown-content a:hover {
    background-color: #555; 
}

.dark-mode .close {
    color: #ccc;
}

.dark-mode .close:hover,
.dark-mode .close:focus {
    color: #fff;
}
    </style>
</head>
<body id="body"> 
<header>
        <div class="header-container">
            <h1>Notes Organiser</h1>
            <div class="account-dropdown" id="accountDropdown">
                <button class="account-button">Donate Books</button>
                </div>
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
        <div class="table-container">
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
        $sql = "SELECT n.*, t.name AS teacher_name 
        FROM tb_notes n 
        JOIN tb_userdetail u ON n.year = u.year 
        JOIN tb_teacherdetail t ON n.teacher_id = t.teacher_id
        WHERE u.reg_no = '{$_SESSION['reg_no']}'
        ORDER BY n.notes_id DESC";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table class='notes-table'>";
            echo "<tr><th>Title</th><th>Subject</th><th>Course Code</th><th>Teacher Name</th><th>Link</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["title"]."</td><td>".$row["subject"]."</td><td>".$row["course_code"]."</td><td>".$row["teacher_name"]."</td>";
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
    </main>
    </div>
</body>
</html>
