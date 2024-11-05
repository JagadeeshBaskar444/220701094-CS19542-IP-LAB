<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = $conn->real_escape_string($_POST['cname']);

    $sql = "INSERT INTO CUSTOMER (CNAME) VALUES ('$cname')";
    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<a href="index.html">Go Back</a>
