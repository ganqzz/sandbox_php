<?php
define('MAX_FILE_SIZE', 2097152);
define('UPLOAD_DIR', 'uploads/');

var_dump($_REQUEST);
var_dump($_FILES);
if (isset($_FILES['files']['name'][0])) {
    $files = $_FILES['files'];
    //var_dump($files);

    $uploaded = array();
    $failed = array();

    $allowed = array('txt', 'jpg', 'html', 'gif', 'pdf');

    foreach ($files['name'] as $position => $file_name) {

        $file_tmp = $files['tmp_name'][$position];
        $file_type = $files['type'][$position];
        $file_size = $files['size'][$position];
        $file_error = $files['error'][$position];

        $s = explode('.', $file_name);
        $file_ext = strtolower(end($s)); // end(&$array)

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= MAX_FILE_SIZE) {
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination = UPLOAD_DIR . $file_name_new;

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        $uploaded[$position] = $file_destination;
                    } else {
                        $failed[$position] = "[{$file_name}] failed to upload.";
                    }
                } else {
                    $failed[$position] = "[{$file_name}] is too large.";
                }
            } else {
                $failed[$position] = "[{$file_name}] failed with code '{$file_error}'.";
            }
        } else {
            $failed[$position] = "[{$file_name}] file extension '{$file_ext}' is not allowed.";
        }
    } // endforeach

    if (!empty($uploaded)) {
        print_r($uploaded);
    }

    if (!empty($failed)) {
        print_r($failed);
    }

}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Multi File Upload</title>
</head>
<body>
<p>複数ファイル</p>

<form action="multi_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple><!--[]は必須-->
    <input type="submit" value="upload">
</form>
</body>
