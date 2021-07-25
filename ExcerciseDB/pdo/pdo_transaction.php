<?php
try {
    require_once '../includes/pdo_connect_sqlite.php';
    // Set up prepared statements transfer from one account to another
    $amount = 200;
    $payer = 'John White';
    $payee = 'Jane Black';
    $debit = 'UPDATE savings SET balance = balance - :amount WHERE name = :payer';
    $credit = 'UPDATE savings SET balance = balance + :amount WHERE name = :payee';

    $pay = $db->prepare($debit);
    $pay->bindParam(':amount', $amount);
    $pay->bindParam(':payer', $payer);

    $receive = $db->prepare($credit);
    $receive->bindParam(':amount', $amount);
    $receive->bindParam(':payee', $payee);

    // Transaction
    $db->beginTransaction();
    $pay->execute();
    if (!$pay->rowCount()) {
        $db->rollBack();
        $error = "Transaction failed: could not update $payer's balance.";
    } else {
        $receive->execute();
        if (!$receive->rowCount()) {
            $db->rollBack();
            $error = "Transaction failed: could not update $payee's balance.";
        } else {
            $db->commit();
        }
    }

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO Transaction</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO Transactions</h1>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Balance</th>
    </tr>
    <?php foreach ($db->query('SELECT name, balance FROM savings') as $row) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo number_format($row['balance'], 2); ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
