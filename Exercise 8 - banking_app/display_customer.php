<?php
include 'db.php';

$sql = "SELECT * FROM CUSTOMER";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Customer Information</h2>";
    echo "<table border='1'><tr><th>CID</th><th>CNAME</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["CID"]. "</td><td>" . $row["CNAME"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No customers found.";
}
$conn->close();
?>
<a href="index.html">Go Back</a>
