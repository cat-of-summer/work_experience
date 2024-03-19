<?php
function is_email_valid($email)
{ 
    if (!preg_match('~^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$~', $email)) {
        return false;
    }
    return true;
}

$username = $_POST['username'];
$email = $_POST['email'];
$message = $_POST['message'];
$file = $_FILES['file'];

if ($username and $message and is_email_valid($email) and is_uploaded_file($file['tmp_name'])) {
    echo("Успешное заполнение формы!");
}

$date = date('d-m-Y');
$time = date('H-i-s'); 

while (file_exists(__DIR__ ."\messages\\$email\\$date\\$time\data.txt")) {
    $time = date('H:i:s'); 
}

$current_path = __DIR__ ."\messages\\$email\\$date\\$time\\";

if (!mkdir($current_path, 0777, true)) {
    die('Не удалось создать директории...');
}

file_put_contents($current_path.'data.txt', implode("\n",['username = '.$username,
                                                          'email = '.$email,
                                                          'message = '.$message,
                                                          'filepath = '.$current_path.$file['name']]));

move_uploaded_file($file['tmp_name'], $current_path.$file['name']);
                                            