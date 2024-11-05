<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password is empty
$dbname = "employee_banking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data
$ename = $_POST['ename'];
$desig = $_POST['desig'];
$dept = $_POST['dept'];
$doj = $_POST['doj'];
$salary = $_POST['salary'];

// Step 3: Insert data into the table
$sql = "INSERT INTO empdetails (ename, desig, dept, doj, salary) VALUES ('$ename', '$desig', '$dept', '$doj', '$salary')";

if ($conn->query($sql) === TRUE) {
    echo "New employee record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Step 4: Close connection
$conn->close();
?>
