<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = intval($_POST['ano']);
    $ttype = $_POST['ttype'];
    $tamount = floatval($_POST['tamount']);
    $tdate = $_POST['tdate'];

    // Check for valid transaction type
    if (!in_array($ttype, ['D', 'W'])) {
        echo "Invalid transaction type. Use 'D' for Deposit or 'W' for Withdrawal.";
        exit;
    }

    // Insert transaction
    $sql = "INSERT INTO TRANSACTION (ANO, TTYPE, TDATE, TAMOUNT) VALUES ($ano, '$ttype', '$tdate', $tamount)";
    if ($conn->query($sql) === TRUE) {
        echo "Transaction recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Update account balance for deposits and withdrawals
    if ($ttype === 'D') {
        $updateSql = "UPDATE ACCOUNT SET BALANCE = BALANCE + $tamount WHERE ANO = $ano";
    } elseif ($ttype === 'W') {
        $updateSql = "UPDATE ACCOUNT SET BALANCE = BALANCE - $tamount WHERE ANO = $ano AND BALANCE >= $tamount";
    }

    if ($conn->query($updateSql) === TRUE) {
        echo "Account balance updated successfully!";
    } else {
        echo "Error updating balance: " . $conn->error;
    }
}
$conn->close();
?>
<a href="index.html">Go Back</a>
