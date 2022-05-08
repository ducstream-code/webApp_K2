<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('../../includes/db.php');

$email = $_POST['email'];
$referer = $_POST['referer'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$username = $name.$firstname;
$password = $_POST['password'];

$stmt = $db->prepare("SELECT hash FROM register_mail WHERE email = :email");
$stmt->execute(['email'=>$email]);
$hash1 = $stmt->fetch();



if ((!isset($email)) || empty($email)) { //verify if email is set
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Un email est necessaire.&type=danger');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //verify email
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Le format du mail n\'est pas valide.&type=danger');    exit;
}

//recuperation du mail pour voir si il existe déjà dans la bdd
$sql = "SELECT email FROM users WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$res = $stmt->fetch();

if($res){
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Ce mail est déjà utilisé.&type=danger');    exit;
}

//check si il y a un nom de determiné
if (!isset($name) || empty($name)) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Vous devez définir un nom.&type=danger');    exit;
}

//check si il y a un prénom de determiné
if (!isset($firstname) || empty($firstname)) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Vous devez définir un prénom.&type=danger');    exit;
}


//check longueur nom
if (strlen($name) < 2 || strlen($name) > 40) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Le nom doit faire entre 2 et 40 charactères.&type=danger');    exit;
}

//check longueur nom
if (strlen($firstname) < 2 || strlen($firstname) > 40) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Le prénom doit faire entre 2 et 40 charactères.&type=danger');    exit;
}



//check si il y a un mot de passe de determiné
if (!isset($password) || empty($password)) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Vous devez définir un mot de passe.&type=danger');    exit;
}

//check longueur du mot de passe
if (strlen($password) < 6 || strlen($password) > 32) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Le mot de passe doit faire entre 6 et 32 charactères.&type=danger');    exit;
}

//check complexitée du mot de passe
if (!(preg_match("#^(.*[0-9]+.*)$#", $password) && preg_match("#^(.*[a-z]+.*)$#", $password) && preg_match("#^(.*[A-Z]+.*)$#", $password))) {
    header('location: ../../pages/client_register.php?email='.$email.'&hash='.$hash1['hash'].'&r='.$referer.'&message=Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.&type=danger');    exit;
}

//insertion des informations dans la base de donnée:

$sql = "INSERT into users ( username, name, firstname, email, password,idReferer) VALUES (:username, :name, :firstname, :email, :password, :referer)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'username'=>$username,
    'name'=>$name,
    'firstname'=>$firstname,
    'email'=> $email,
    'password'=>hash('sha256',$password),
    'referer'=>$referer
]);
//load Qr code
include "phpqrcode/qrlib.php";
$text= $email;
QRcode::png($text, "../../assets/qrCodes/".$email.".png");

//increment registered users for a company
$stmt = $db->prepare("UPDATE clientscompanies SET clientregistered = clientregistered + 1 WHERE id = :id");
$stmt->execute(['id'=>$referer]);

//retire le mail de la table

$stmt = $db->prepare("DELETE FROM register_mail WHERE email = :email");
$stmt->execute(['email'=>$email]);




header('location: ../../index.php?message=Vous pouvez maintenant vous connecter.&type=success');
