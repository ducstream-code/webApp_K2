<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="/css/mycard.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>



    <title>Ma carte</title>
</head>

<body>
<?php
include ("../includes/header.php");
include('../includes/message.php');
?>
<div class="diagonal-box">
    <div class="diagonal_box_content">
        <h1>Avec Loyalty Card, un compte, une carte, des centaines de boutiques partenaires.</h1>
    </div>
</div>

<div class="first_section_container">
    <div class="first_section">
        <h1>Les avantages de la carte LoyaltyCard</h1>
        <div><hr></div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Où manger avec votre carte Ticket Restaurant® ? Retrouvez tous les restos qui acceptent la carte pour déjeuner grâce à l’application MyEdenred</h4>
        </div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Où manger avec votre carte Ticket Restaurant® ? Retrouvez tous les restos qui acceptent la carte pour déjeuner grâce à l’application MyEdenred</h4>
        </div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Où manger avec votre carte Ticket Restaurant® ? Retrouvez tous les restos qui acceptent la carte pour déjeuner grâce à l’application MyEdenred</h4>
        </div>
        <div class="button_container">
            <?= checkLoggedUser() ? '<button class="section_button" onclick="window.location=\'#\'">Voir ma carte</button>' : '<button class="section_button" onclick="window.location=\'register.php\'">Je m\'inscris gratuitement</button>' ?>
        </div>

    </div>
</div>

<div class="second_section_container">

</div>

</body>
</html>
