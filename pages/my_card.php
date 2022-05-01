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
    <script src="../external/tailwind.js"></script>
    <link rel="stylesheet" href="../css/tailwind.css">
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>



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

<div class="flex justify-center">
    <a href="../webgl/examples/simuation.html" class="p-2 rounded bg-[#100A56] text-white text-xl font-semibold hover:bg-[#D4F3F7] hover:text-black mb-8">Découvrez la simulation Loyalty Card</a>
</div>

<div class="first_section_container">
    <div class="first_section">
        <h1>Les avantages de la carte LoyaltyCard</h1>
        <div><hr></div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Ou utiliser vos points LoyaltyCard ? Retrouvez toutes les enseignes qui acceptent la carte pour profiter des offres grâce au site LoyaltyCard</h4>
        </div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Une envie d'un repas a prix casser ? Depensez vos points dans les nombreux points de restaurations partenaires</h4>
        </div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Vous voullez partir en voyage ? Decouvrez les compagnies aérienne vous proposant certains offres</h4>
        </div>
        <div class="button_container">
            <?= checkLoggedUser() ? '<button class="section_button" onclick="window.location=\'#\'">Voir ma carte</button>' : '<button class="section_button" onclick="window.location=\'register.php\'">Je m\'inscris gratuitement</button>' ?>
        </div>

    </div>
</div>

<!-- comptage nombre d'offres de réductions -->
<?php
$stmt = $db->prepare("SELECT id FROM discounts");
$stmt->execute();
$nbDiscount = $stmt->rowCount();

$nbUser = $db->prepare("SELECT id FROM users");
$nbUser->execute();
$nbUser = $nbUser->rowCount();

?>


<div class="second_section_container">
    <div class="data_box">
        <h1><?=$nbDiscount?></h1>
        <h5>Offres dans de nombreux magasins et enseignes partenaires</h5>
    </div>
    <div class="data_box">
        <h1><?=$nbUser?></h1>
        <h5>Clients satisfait par les offres de nos partenaires</h5>
    </div>
    <div class="data_box">
        <h1>200 000</h1>
        <h5>restaurants, commerces et enseignes de distribution partenaires(2)</h5>
    </div>

</div>

</body>
</html>
