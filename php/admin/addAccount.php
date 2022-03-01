<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include('../../includes/db.php');



$email = $_POST['email'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$password = $_POST['password'];

if ((!isset($name)) || empty($name)) { //verify if email is set
    echo 'un nom est necessaire';
    exit;
}

if ((!isset($firstname)) || empty($firstname)) { //verify if email is set
    echo 'un nom de famille est necessaire';
    exit;
}

if ((!isset($email)) || empty($email)) { //verify if email is set
    echo 'un Email est necessaire';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //verify email
    echo 'Le format du mail n\'est pas valide';
    exit;
}

//recuperation du mail pour voir si il existe déjà dans la bdd
$sql = "SELECT email FROM users WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$res = $stmt->fetch();

if($res){
    echo 'Email déjà utilisé';
    exit;
}


//check si il y a un mot de passe de determiné
if (!isset($password) || empty($password)) {
    echo 'vous devez définir un mot de passe ';
    exit;
}

//check longueur du mot de passe
if (strlen($password) < 6 || strlen($password) > 32) {
    echo 'mot de passe entre 6 et 32 characteres';
    exit;
}

//check complexitée du mot de passe
if (!(preg_match("#^(.*[0-9]+.*)$#", $password) && preg_match("#^(.*[a-z]+.*)$#", $password) && preg_match("#^(.*[A-Z]+.*)$#", $password))) {
    echo 'au moins une majuscule, une minuscule et un chiffre';
    exit;
}

//insertion des informations dans la base de donnée:

$sql = "INSERT into users ( name,firstname, email, password ) VALUES (:name,:firstname, :email, :password )";
$stmt = $db->prepare($sql);
$stmt->execute([
    'name' => $name,
    'firstname' => $firstname,
    'email'=> $email,
    'password'=>hash('sha256',$password)
]);

//envoie mail de verification:

$message = '
Cher ' . $_POST['name'] . ',
Un compte vous a été crée sur LoyaltyCard
Vos identifiants sont les suiant : identifiant: '.$_POST['email'].'
Mot de passe: '.$_POST['password'].'

';
$headers = 'From:noreply@loyaltycard.fr' . "\r\n";
mail($_POST['email'], 'Inscription | Verification', $message, $headers);


echo 'ok';
