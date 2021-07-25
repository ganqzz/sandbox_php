<?php
/*
-- MySQL --
CREATE TABLE users (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password CHAR(32)
);
*/

// デバッグ: var_dump($stmt->errorInfo());

// データベースへの接続
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ganq', 'ganq', 'hawkeye');
} catch (PDOException $e) {
    var_dump($e->getMessage());
    exit;
}

function showUsers() {
    global $dbh;

    // SELECT - fetchAll()
    $sql = "SELECT * FROM users";
    foreach ($dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $user) {
        echo $user['name'] . ": " . $user['email'] . PHP_EOL;
    }

    // query()
    //foreach ($dbh->query($sql) as $user) {
    //    echo $user['name'] . ": " . $user['email'] . PHP_EOL;
    //}

    // prepare
    //$stmt = $dbh->prepare($sql);
    //$stmt->execute();
    //while ($user = $stmt->fetch()) {
    //    echo $user['name'] . ": " . $user['email'] . PHP_EOL;
    //}
}

showUsers();

// count
function countUsers() {
    global $dbh;
    echo $dbh->query("SELECT count(*) FROM users")->fetchColumn() . " records", PHP_EOL;
}
countUsers();

echo "---" . PHP_EOL;

// Insert
// Prepared by Name
$stmt = $dbh->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
$stmt->execute(array("n1","e1@example.com","p1"));

// bindParam()
$stmt = $dbh->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $password);
$name = "n2";
$email = "e2@hoge.com";
$password = "p2";
$stmt->execute();
// var_dump($dbh->errorInfo());
// var_dump($stmt->errorInfo());

// Prepared by Name
$stmt = $dbh->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
$stmt->execute(array(":name"=>"n3",":email"=>"e3@fefe.com",":password"=>"p3"));

// bindParam() by Name
$stmt = $dbh->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);
$name = "n4";
$email = "e4@fuga.com";
$password = "p4";
$stmt->execute();

showUsers();
countUsers();
echo "Last inserted ID: " . $dbh->lastInsertId() . PHP_EOL;

echo "---" . PHP_EOL;

// UPDATE
$stmt = $dbh->prepare("UPDATE users SET name = :name WHERE email = :email");
$stmt->execute(array(":name"=>"Jone Doe", ":email"=>"e1@example.com"));

showUsers();

echo "---" . PHP_EOL;

// DELETE
$stmt = $dbh->prepare("DELETE FROM users WHERE password LIKE :password");
$stmt->execute(array(":password"=>"p%"));

echo $stmt->rowCount() . " records deleted" . PHP_EOL;

showUsers();
countUsers();

//
echo "done" . PHP_EOL;


// 解放
$dbh = null;


