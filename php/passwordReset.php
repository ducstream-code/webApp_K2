<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../includes/db.php";
$email = $_POST['email'];

$stmt = $db->prepare("SELECT id,name FROM users WHERE email = :email");
$stmt->bindParam(':email',$email);
$stmt->execute();
$ans = $stmt->fetch();

if(!$ans){
    header('Location:../index.php?message=Ce compte n\'a pas de compte sur notre site&type=alert');
    exit();
}

$name = $ans['name'];
$rand = random_bytes(15);
$hash = hash('sha256',$rand);

$stmt = $db->prepare("DELETE FROM reset_mail WHERE id_user = :uid");
$stmt->bindParam(':uid',$ans['id']);
$stmt->execute();

$stmt = $db->prepare("INSERT INTO reset_mail (hash, email, id_user ) VALUES (:hash, :email, :id_user)");
$stmt->bindParam(':hash',$hash);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':id_user',$ans['id']);
$stmt->execute();

$message = '
Cher ' . $name . ',
  
Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe:
https://www.aurelienk.space.fr/php/check_mail_reset.php?email='. $_POST['email'] . '&hash='. $hash . '
  
';

$headers = 'From:noreply@aurelienk.space' . "\r\n";
mail($_POST['email'], 'Réinitialisation | Mot de passe', $message, $headers);
header('Location:../index.php?message=Un mail de reinitialisation a été envoyé&type=success');


