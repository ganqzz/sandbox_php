<?php

$clean = [];
$clean['get'] = isset($_GET['get']) ? $_GET['get'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clean['text'] = $_POST['text'];
    var_dump($clean);
    // header("Location: /");
    exit;
}
?>

<h2>Form</h2>
<h4>action="form_action_demo.php"</h4>
<form method="POST" action="form_action_demo.php">
    <input type="text" name="text" value="hoge">
    <input type="submit" value="Send">
</form>

<h4>action=""</h4>
<form method="POST" action="">
    <input type="text" name="text" value="hoge">
    <input type="submit" value="Send">
</form>

<h4>No action attribute (same as action="")</h4>
<form method="POST">
    <input type="text" name="text" value="hoge">
    <input type="submit" value="Send">
</form>
