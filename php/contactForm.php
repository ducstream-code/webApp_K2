<?php

include "../includes/db.php";

$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];

if (!isset($name)|| empty($name)){
    echo 'EMPTY NAME';
    exit();
}
if (!isset($email)|| empty($email)){
    echo 'EMPTY EMAIL';
    exit();
}
if (!isset($message)|| empty($message)){
    echo 'EMPTY MESSAGE';
    exit();
}

if(strlen($message)<20 || strlen($message)>255){
    echo 'MESSAGE BETWEEN 20 & 255 CHARS';
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //verify email
    echo 'INVALID EMAIL';
    exit;
}



$stmt = $db->prepare("INSERT INTO contact (name, email,message) VALUES ('$name','$email','$message')");
$stmt->execute();

echo 'MESSAGE ENVOYÉ';
