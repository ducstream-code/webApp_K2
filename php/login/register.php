<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include('../../includes/db.php');


$email = $_POST['email'];
$name = $_POST['name'];
$earnings = $_POST['earnings'];
$password = $_POST['password'];

if ((!isset($email)) || empty($email)) { //verify if email is set
    header('location: ../../pages/register.php?message=Un email est necessaire.&type=danger');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //verify email
    header('location: ../../pages/register.php?message=Le format du mail n\'est pas valide.&type=danger');
    exit;
}

//recuperation du mail pour voir si il existe déjà dans la bdd
$sql = "SELECT email FROM clientscompanies WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$res = $stmt->fetch();

if ($res) {
    header('location: ../../pages/register.php?message=Ce mail est déjà utilisé.&type=danger');
    exit;
}


//check si il y a un mot de passe de determiné
if (!isset($password) || empty($password)) {
    header('location: ../../pages/register.php?message=Vous devez définir un mot de passe.&type=danger');
    exit;
}

//check longueur du mot de passe
if (strlen($password) < 6 || strlen($password) > 32) {
    header('location: ../../pages/register.php?message=Le mot de passe doit faire entre 6 et 32 charactères.&type=danger');
    exit;
}

//check complexitée du mot de passe
if (!(preg_match("#^(.*[0-9]+.*)$#", $password) && preg_match("#^(.*[a-z]+.*)$#", $password) && preg_match("#^(.*[A-Z]+.*)$#", $password))) {
    header('location: ../../pages/register.php?message=Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.&type=danger');
    exit;
}

//insertion des informations dans la base de donnée:

$sql = "INSERT into clientscompanies ( name, email, password, earnings) VALUES (:name, :email, :password, :earnings)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'name' => $name,
    'earnings' => $earnings,
    'email' => $email,
    'password' => hash('sha256', $password)
]);


// Email de validation de compte
$hash = hash('sha512', random_bytes(15));

$sql = "SELECT id FROM clientscompanies WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->execute([
    'email' => $email,
]);

$res = $stmt->fetch();

$sql = "INSERT INTO register_mail (email,hash) VALUES (:email, :hash)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'email' => $email,
    'hash' => $hash,
]);

//envoie mail de verification:

$message = '
Cher ' . $_POST['name'] . ',
Merci de vous être inscrit.e sur Loyalty Card!

Veuillez cliquer sur ce lien pour vérifier votre email:
https://aurelienk.space/php/companies/verify_email.php?email=' . $_POST['email'] . '&hash=' . $hash . '

';
$headers = 'From:noreply@loyaltycard.fr' . "\r\n";
mail($_POST['email'], 'Inscription | Verification', $message, $headers);


header('location: ../../index.php?message=Le compte a bien été crée, vous pouvez désormais vous connecter&type=success');
