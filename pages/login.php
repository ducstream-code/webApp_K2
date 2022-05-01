<?php

include('../includes/db.php');
include('../includes/check_session.php');
checkLoggedUser() ? header('location: ../index.php?message=Vous êtes déjà connectés&type=danger') : ''
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
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


    <title>Accueil</title>
</head>

<body>
<?php

include("../includes/header.php");
?>
<div class="container">

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="../php/login/login_companies.php" method="post">
    <h3>Je suis une entreprise</h3>

    <label for="username">Email</label>
    <input name="email" type="email" placeholder="Email" id="username">

    <label for="password">Mot de passe</label>
    <input name="password" type="password" placeholder="Mot de passe" id="password">

    <button>Se connecter</button>
</form>
<form action="../php/login/login.php" method="post">
    <h3>Je suis un client</h3>

    <label for="username">Email</label>
    <input name="email" type="email" placeholder="Email" id="username">

    <label for="password">Mot de passe</label>
    <input name="password" type="password" placeholder="Mot de passe" id="password">

    <button>Se connecter</button>
    <a href="mailToChange.php">Mot de passe oublié ?</a>

</form>
</div>
<?php
include("../includes/message.php");
?>
</body>
</html>
