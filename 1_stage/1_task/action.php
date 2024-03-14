<?php
function is_email_valid($email)
{ 
    if (!preg_match('~^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$~', $email)) {
        return false;
    }
    return true;
}

function is_file_type_valid($file_type)
{ 
    if (!preg_match('~.png|.jpg~', $file_type)) {
        return false;
    }
    return true;
}

$username = $_POST['username'];
$email = $_POST['email'];
$message = $_POST['message'];
$file = $_FILES['file'];

if ($username and $message and is_email_valid($email) and is_uploaded_file($file['tmp_name']) and is_file_type_valid($file['name'])) {
    echo("Успешное заполнение формы!");
}

$i = 1;
while (file_exists(__DIR__ ."\messages\message_$i\data.txt")) {
    $i++;
}

$message_path = __DIR__ ."\messages\message_$i\\";
mkdir($message_path);

file_put_contents($message_path.'data.txt', implode("\n",['username = '.$username,
                                                          'email = '.$email,
                                                          'message = '.$message,
                                                          'filepath = '.$message_path.$file['name']]));

move_uploaded_file($file['tmp_name'], $message_path.$file['name']);
                                            