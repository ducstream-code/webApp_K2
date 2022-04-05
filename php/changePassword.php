<?php
include "../includes/db.php";
$hash = $_GET['hash'];
$password = $_GET['password'];


if (!isset($password) || empty($password)) {
    echo 'Vous devez définir un mot de passe';
    exit;
}

//check longueur du mot de passe
if (strlen($password) < 6 || strlen($password) > 32) {
    echo 'Le mot de passe doit faire entre 6 et 32 charactères';
    exit;
}

//check complexitée du mot de passe
if (!(preg_match("#^(.*[0-9]+.*)$#", $password) && preg_match("#^(.*[a-z]+.*)$#", $password) && preg_match("#^(.*[A-Z]+.*)$#", $password))) {
   echo 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre';
   exit();
}


$stmt = $db->prepare('SELECT email, id_user FROM reset_mail WHERE hash = :hash');
$stmt->bindParam(':hash',$hash);
$stmt->execute();
$res = $stmt->fetch();

$hashPass = hash('sha256',$password);

$stmt = $db->prepare("UPDATE users SET password = :password WHERE id = :uid");
$stmt->bindParam(":password",$hashPass);
$stmt->bindParam(":uid",$res['id_user']);
$stmt->execute();

$stmt = $db->prepare("DELETE FROM reset_mail WHERE id_user = :uid");
$stmt->bindParam(":uid",$res['id_user']);
$stmt->execute();

echo 'ok';

