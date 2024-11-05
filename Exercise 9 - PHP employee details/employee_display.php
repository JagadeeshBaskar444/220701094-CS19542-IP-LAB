<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_banking";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Step 2: Retrieve employee records
$sql = "SELECT * FROM empdetails";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<h2>Employee Details</h2>";
    echo "<table border='1'>";
    echo "<tr><th>EmpID</th><th>Name</th><th>Designation</th><th>Department</th><th>Date of Joining</th><th>Salary</th></tr>";
   // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["empid"]."</td><td>".$row["ename"]."</td><td>".$row["desig"]."</td><td>".$row["dept"]."</td><td>".$row["doj"]."</td><td>".$row["salary"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
// Step 3: Close connection
$conn->close();
?>
