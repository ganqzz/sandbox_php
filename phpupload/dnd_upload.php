<?php
header('Content-Type: application/json');

define('UPLOAD_DIR', 'uploads/');

$allowed = array('txt', 'jpg', 'html', 'gif', 'pdf', 'mp4', 'flv', 'png');
$processed = array();

//print_r($_FILES);

if (!empty($_FILES['files']['name'][0])) {
    foreach ($_FILES['files']['name'] as $key => $name) {
        if ($_FILES['files']['error'][$key] === 0) {
            $temp = $_FILES['files']['tmp_name'][$key];

            $s = explode('.', $name);
            $ext = strtolower(end($s)); // end(&$array)

            $file = uniqid('', true) . time() . '.' . $ext;

            if (in_array($ext, $allowed) && move_uploaded_file($temp, UPLOAD_DIR . $file)) {
                $processed[] = array(
                    'name'     => $name,
                    'file'     => $file,
                    'uploaded' => true
                );
            } else {
                $processed[] = array(
                    'name' => $name,
                    'uploaded' => false
                );
            }
        }
    }
}

echo json_encode($processed);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>HTML5 DnD Uploader</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
<div class="wrapper">
    <div class="upload-console">
        <h2 class="upload-console-header">Upload</h2>

        <div class="upload-console-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" id="standard-upload-files" multiple/>
                <input type="submit" value="Upload files" id="standard-upload" name="submit"/>
            </form>
            <h3>Or drag and drop files below</h3>

            <div class="upload-console-drop" id="drop-zone">
                Just
            </div>
            <div class="bar">
                <div class="bar-fill" id="bar-fill">
                    <div class="bar-fill-text" id="bar-fill-text"></div>
                </div>
            </div>

            <div id="uploads-finished" class="hidden">
                <h3>Processed files</h3>

                <!--<div class="upload-console-upload">
                    <a href="#">filename.jpg</a>
                    <span>Success</span>
                </div>-->
            </div>
        </div>
    </div>
</div>
<script src="js/upload.js"></script>
<script src="js/global.js"></script>
</body>
</html>
