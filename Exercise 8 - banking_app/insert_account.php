<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cid = intval($_POST['cid']);
    $atype = $_POST['atype'];
    $balance = floatval($_POST['balance']);

    // Check for valid account type
    if (!in_array($atype, ['S', 'C'])) {
        echo "Invalid account type. Use 'S' for Savings or 'C' for Current.";
        exit;
    }

    $sql = "INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES ('$atype', $balance, $cid)";
    if ($conn->query($sql) === TRUE) {
        echo "New account added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<a href="index.html">Go Back</a>
