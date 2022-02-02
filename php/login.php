<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('../includes/db.php');
include ('../includes/check_session.php');


$email = $_POST['email'];
$password = $_POST['password'];

if ((!isset($_POST['email'])) || empty($_POST['email'])) {
    header('location: ../pages/login.php?message=Vous devez remplir tous les champs.&type=danger');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: ../pages/login.php?message=Email invalide.&type=danger');
    exit;
}

if ((!isset($_POST['password'])) || empty($_POST['password'])) {
    header('location: ../pages/login.php?message=Vous devez remplir tous les champs.&type=danger');
    exit;
}


$sql = "SELECT email, password, id FROM users where email = :email AND password = :password";
$stmt = $db->prepare($sql);
$stmt->execute([
    'email'=>$email,
    'password'=>hash('sha256',$password),
]);
$res = $stmt->fetch();

if(!$res){
    header('location: ../pages/login.php?message=Identifiants incorrects.&type=danger');
    exit;
}
setcookie('id', $res['id'], time()+60*60*24*30, '/');
setcookie('password', $res['password'], time()+60*60*24*30, '/');


header('location: ../index.php');
