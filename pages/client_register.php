<?php


// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('../includes/db.php');
include ('../includes/check_session.php');
$mail = $_GET['email'];
$referrer = $_GET['r'];

$hash = $_GET['hash'];

if(!isset($hash) || empty($hash)){
    header('Location:../index.php');
}

$stmt = $db->prepare("SELECT hash FROM register_mail WHERE hash = :hash");
$stmt->execute(['hash'=>$hash]);
$res = $stmt->rowCount();

if ($res < 1){
    header('Location:../index.php');
    exit;
}

include '../includes/header.php'
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>


    <title>Inscriptions</title>
</head>

<body>
<?php
include("../includes/header.php");
?>

<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="../php/login/client_register.php" method="post">
    <h3>S'inscrire</h3>

    <label for="email">Email</label>
    <input name="email" value="<?=$mail ?>" type="email" placeholder="Email" id="email" readonly>

    <label for="name">Nom</label>
    <input type="text" placeholder="Nom" name="name" id="name">

    <label for="firstname">Prénom</label>
    <input type="text" placeholder="Prénom" name="firstname" id="firstname">

    <label for="password">Mot de passe</label>
    <input name="password" type="password" placeholder="Mot de passe" id="password">

    <button>S'inscrire</button>
    <input hidden value="<?=$referrer?> " name="referer">
</form>
<?php include('../includes/message.php');?>
</body>
<script src="/js/register.js"></script>
</html>

