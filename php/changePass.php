<?php
include '../includes/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$password = $_GET['password'];
$id = $_GET['id'];


//check si il y a un mot de passe de determiné
if (!isset($password) || empty($password)) {
    echo 'mot de passe invalide';
    exit;
}

//check longueur du mot de passe
if (strlen($password) < 6 || strlen($password) > 32) {
    echo 'mot de passe invalide';
    exit;
}

//check complexitée du mot de passe
if (!(preg_match("#^(.*[0-9]+.*)$#", $password) && preg_match("#^(.*[a-z]+.*)$#", $password) && preg_match("#^(.*[A-Z]+.*)$#", $password))) {
    echo 'mot de passe invalide';
    exit;
}

$hashPass = hash('sha256',$password);

$stmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
$stmt->bindParam(':password',$hashPass);
$stmt->bindParam(':id',$id);
$stmt->execute();

echo 'Mot de passe changé';

