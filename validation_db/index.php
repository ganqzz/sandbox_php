<?php

require_once 'classes/Database.php';
require_once 'classes/ErrorHandler.php';
require_once 'classes/Validator.php';

$db = new Database();
$errorHandler = new ErrorHandler();

//var_dump($db->table('users')->exists(['username' => 'hoge']));

if (!empty($_POST)) {
    $validator = new Validator($db, $errorHandler);
    $validation = $validator->check($_POST, [
        'username'       => [
            'required'  => true,
            'minlength' => 3,
            'maxlength' => 20,
            'alnum'     => true,
            'unique'    => 'users'
        ],
        'email'          => [
            'required'  => true,
            'maxlength' => 255,
            'email'     => true,
            'unique'    => 'users'
        ],
        'password'       => [
            'required'  => true,
            'minlength' => 6
        ],
        'password_again' => [
            'match' => 'password'
        ],
    ]);

    //var_dump($validator->errors());

    if ($validation->fails()) {
        echo "<pre>", print_r($validation->errors()->all()), "</pre>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Validation2</title>
</head>

<body>

<form action="#" method="post">
    <div>
        Username: <input type="text" name="username" autocomplete="off">
    </div>

    <div>
        E-mail: <input type="text" name="email" autocomplete="off">
    </div>

    <div>
        Password: <input type="password" name="password" autocomplete="off">
    </div>

    <div>
        Repeat password: <input type="password" name="password_again" autocomplete="off">
    </div>

    <div>
        <input type="submit">
    </div>
</form>

</body>
</html>
