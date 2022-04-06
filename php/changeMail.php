<?php
include '../includes/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$email = $_GET['mail'];
$id = $_GET['id'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //verify email
echo 'Mail invalide';
exit;
}

$stmt = $db->prepare("UPDATE users SET email = :mail WHERE id = :id");
$stmt->bindParam(':mail',$email);
$stmt->bindParam(':id',$id);
$stmt->execute();

echo 'Mail changé';

