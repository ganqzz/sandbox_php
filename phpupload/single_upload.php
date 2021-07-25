<?php
define('MAX_FILE_SIZE', 2097152);
define('UPLOAD_DIR', 'uploads/');

var_dump($_REQUEST);
var_dump($_FILES);
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    //var_dump($file);

    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_type = $file['type'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    $s = explode('.', $file_name);
    $file_ext = strtolower(end($s)); // end(&$array)
    //var_dump($file_ext);

    $allowed = array('txt', 'jpg', 'html', 'gif', 'pdf');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= MAX_FILE_SIZE) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = UPLOAD_DIR . $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo $file_destination;
                } else {
                    echo "[{$file_name}] failed to upload.";
                }
            } else {
                echo "[{$file_name}] is too large.";
            }
        } else {
            echo "[{$file_name}] failed with code '{$file_error}'.";
        }
    } else {
        echo "[{$file_name}] file extension '{$file_ext}' is not allowed.";
    }
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Single File Upload</title>
</head>
<body>
<p>単一ファイル</p>

<form action="single_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="upload">
</form>
<br>

</body>
