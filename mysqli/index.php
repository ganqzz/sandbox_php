<?php
//error_reporting(0);
require_once 'db/connect.php';
require_once 'functions/security.php';

$records = array();

var_dump($_POST);
if (!empty($_POST)) {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['bio'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $bio = trim($_POST['bio']);

        // "0"に注意
        // if ($first_name && $last_name && $bio) {
        // if (!empty($first_name) && !empty($last_name) && !empty($bio)) {
        if ($first_name != "" && $last_name != "" && $bio != "") {
            $insert = $db->prepare("INSERT INTO people (first_name, last_name, bio, created) VALUES (?, ?, ?, NOW())");
            $insert->bind_param('sss', $first_name, $last_name, $bio);
            if ($insert->execute()) {
                header('Location: index.php');
                die;
            }
        }
    }
}

if ($results = $db->query("SELECT * FROM people")) {
    if ($results->num_rows) {
        while ($row = $results->fetch_object()) {
            $records[] = $row;
        }
        $results->free();
    }
}
//var_dump($records);

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>People</title>
</head>
<body>
<h3>People</h3>
<?php if (count($records)) { ?>
    <table>
        <thead>
        <tr>
            <th>hoge</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $r) { ?>
            <tr>
                <td><?php echo escape($r->id) ?></td>
                <td><?php echo escape($r->first_name) ?></td>
                <td><?php echo escape($r->last_name) ?></td>
                <td><?php echo escape($r->bio) ?></td>
                <td><?php echo escape($r->created) ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    No Records.
<?php } ?>
<hr>
<form action="" method="post">
    <div class="field">
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" autocomplete="off">
    </div>
    <div class="field">
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" autocomplete="off">
    </div>
    <div class="field">
        <label for="bio">Bio</label>
        <textarea name="bio" id="bio"></textarea>
    </div>
    <input type="submit" name="submit" value="Input">
</form>
</body>
</html>
