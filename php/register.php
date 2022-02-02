<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include('../includes/db.php');


$username = $_POST['username'];
$email = $_POST['email'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$password = $_POST['password'];

echo $password;
echo $username;

if ((!isset($email)) || empty($email)) { //verify if email is set
    header('location: ../pages/register.php?message=Un email est necessaire.&type=danger');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //verify email
    header('location: ../pages/register.php?message=Le format du mail n\'est pas valide.&type=danger');
    exit;
}

//recuperation du mail pour voir si il existe déjà dans la bdd
$sql = "SELECT email FROM USERS WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$res = $stmt->fetch();

if($res){
    header('location: ../pages/register.php?message=Ce mail est déjà utilisé.&type=danger');
    exit;
}

//verification nombre char username
if (strlen($username) < 3 || strlen($username) > 20) {
    header('location: ../pages/register.php?message=Le nom d\'utilisateur dois faire entre 3 et 20 charactères .&type=danger');
    exit;
}

//recuperation du username pour voir si il existe déjà dans la bdd
$sql = "SELECT username FROM users WHERE username = :username";
$stmt = $db->prepare($sql);
$stmt->execute([
    'username' => $username,
]);
$res = $stmt->fetch();

if($res){
    header('location: ../pages/register.php?message=Ce nom d\'utilisateur existe déjà.&type=danger');
    exit;
}

//check si il y a un mot de passe de determiné
if (!isset($password) || empty($password)) {
    header('location: ../pages/register.php?message=Vous devez définir un mot de passe.&type=danger');
    exit;
}

//check longueur du mot de passe
if (strlen($password) < 6 || strlen($password) > 32) {
    header('location: ../pages/register.php?message=Le mot de passe doit faire entre 6 et 32 charactères.&type=danger');
    exit;
}

//check complexitée du mot de passe
if (!(preg_match("#^(.*[0-9]+.*)$#", $password) && preg_match("#^(.*[a-z]+.*)$#", $password) && preg_match("#^(.*[A-Z]+.*)$#", $password))) {
    header('location: ../signup.php?message=Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.&type=danger');
    exit;
}

//insertion des informations dans la base de donnée:

$sql = "INSERT into USERS ( name, firstname, email, password, username) VALUES (:name, :firstname, :email, :password, :username)";
$stmt = $db->prepare($sql);
$res = $stmt->execute([
    'name' => $name,
    'firstname' => $firstname,
    'email'=> $email,
    'password'=>hash('sha256',$password),
    'username'=>$username,
]);

if(!$res){
    header('location: ../signup.php?message=Erreur lors de l\'inscription.&type=danger');
    exit;
}

// Email de validation de compte
$hash = hash('sha512', random_bytes(15));

$sql = "SELECT id FROM USERS WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->execute([
    'email' => $email,
]);

$res = $stmt->fetch();

$sql = "INSERT INTO VERIFY_EMAIL (userID,hash) VALUES (:userid, :hash)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'userid'=> $res['id'],
    'hash' => $hash,
]);

//envoie mail de verification:
/*
$message = '
Cher ' . $_POST['username'] . ',
Merci de vous être inscrit.e sur Loyalty Card!

Veuillez cliquer sur ce lien pour vérifier votre email:
http://127.0.0.1:81/php/verify_email.php?email='. $_POST['email'] . '&hash='. $hash . '

';
$headers = 'From:noreply@loyaltycard.fr' . "\r\n";
mail($_POST['email'], 'Inscription | Verification', $message, $headers);
*/

header('location: /index.php?message=Le compte a bien été crée, vous pouvez désormais vous connecter&type=success');
