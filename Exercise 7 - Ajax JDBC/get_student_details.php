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

if (isset($_GET['reg_no'])) {
    $selectedRegNo = $_GET['reg_no'];
    $stmt = $conn->prepare("SELECT * FROM students WHERE reg_no = ?");
    $stmt->bind_param("s", $selectedRegNo);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    echo json_encode($result);
}

$conn->close();
?>
