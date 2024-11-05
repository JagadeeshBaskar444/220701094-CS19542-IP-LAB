<?php
// Database connection
$host = 'localhost';
$db = 'school';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student registration numbers for the dropdown
$sql = "SELECT reg_no FROM students";
$result = $conn->query($sql);
$regNumbers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $regNumbers[] = $row['reg_no'];
    }
}

include 'student.html';
$conn->close();
?>
