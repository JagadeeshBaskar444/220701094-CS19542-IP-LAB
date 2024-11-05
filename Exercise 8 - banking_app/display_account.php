<?php
include 'db.php';

$sql = "SELECT * FROM ACCOUNT";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Account Information</h2>";
    echo "<table border='1'><tr><th>ANO</th><th>ATYPE</th><th>BALANCE</th><th>CID</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ANO"]. "</td><td>" . $row["ATYPE"]. "</td><td>" . $row["BALANCE"]. "</td><td>" .
		$row["CID"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No accounts found.";
}
$conn->close();
?>
<a href="index.html">Go Back</a>
