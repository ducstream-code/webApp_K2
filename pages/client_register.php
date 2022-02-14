<?php


// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../includes/db.php');

$hash = $_GET['hash'];

if(!isset($hash) || empty($hash)){
    header('Location:http://localhost:81');
}

$stmt = $db->prepare("SELECT hash FROM register_mail WHERE hash = :hash");
$stmt->execute(['hash'=>$hash]);
$res = $stmt->rowCount();

if ($res < 1){
    header('Location:http://localhost:81');
}



