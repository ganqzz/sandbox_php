<?php

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function connectDb() {
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

function setToken() {
    //$_SESSION['token'] = sha1(uniqid(mt_rand(), true));
    $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function checkToken() {
    if (empty($_SESSION['token']) ||
        empty($_POST['token']) ||
        //$_SESSION['token'] !== $_POST['token']) { // ~5.5
        !hash_equals($_SESSION['token'], $_POST['token'])) { // 5.6~
        echo "不正なPOSTが行われました！";
        http_response_code(403);
        exit;
    }
}

function emailExists($email, $dbh) {
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $user = $stmt->fetch();
    return $user ? true : false;
}

function getSha1Password($s) {
    return sha1(PASSWORD_KEY . $s);
}
