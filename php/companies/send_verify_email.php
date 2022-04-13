<?php

// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../includes/db.php');

$email = $_POST['email'];
$hash = hash('sha256', $email);



$message = '
Cher ' . $email . ',
Votre entreprise vous à inscris sur loyaltyCard!

Veuillez cliquer sur ce lien pour vérifier votre email :
https://aurelienk.space/php/companies/verify_email.php?email='.$email.'&hash='. $hash .'

';
$headers = 'From:inscription@loyaltycard.fr' . "\r\n";
mail($email, 'Inscription loyaltyCard', $message, $headers);
header('Location: ../../index.php?message=Email Envoyé&type=success');