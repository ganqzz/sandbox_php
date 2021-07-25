<?php

define('DSN', 'sqlite::memory:');
function connectDb() {
    try {
        return new PDO(DSN);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

$dbh = connectDB();

$create = "create table users (id integer not null primary key autoincrement, name text);";
$insert = "insert into users (name) values ('hoge');";
$sql = "select * from users;";

$dbh->query($create);
$dbh->query($insert);

$stmt = $dbh->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

var_dump($stmt->fetchAll());

$dbh = null;
