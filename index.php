<?php
include ('includes/db.php');
include ('includes/check_session.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <link rel="stylesheet" href="/css/index.css">
        <link rel="icon" type="image/png" href=""/>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
                crossorigin="anonymous"></script>



        <title>Accueil</title>
    </head>

    <body>
<?php include ("./includes/header.php"); ?>
<div class="diagonal-box">
    <div class="diagonal_box_content">
        <div class="left_index">
            <h3> LoyaltyCard vous reverse des points lorsque vous achetez chez nos partenaires !</h3>
            <p><?= checkLoggedUser() ? 'connecté' : 'non connecté' ?></p>
            <?= checkLoggedUser() ? '<a href="#offers">Je consulte les offres</a>' : '<a href>Je m\'inscris gratuitement - 15 points offerts</a>' ?>

            <div class="index_logos">
                <img class="image_fit" src="assets/images/companies_logo/darty.png">
                <img class="image_fit" src="assets/images/companies_logo/groupon.png">
                <img class="image_fit" src="assets/images/companies_logo/Paul.png">


            </div>
        </div>
        <div class="right_index">
            <img src="assets/images/background/svgexport-3.svg">

        </div>
    </div>
</div>

<div class="how_it_works">
    <h4>Comment fonctionne LoyaltyCard ?</h4>
<div class="cards_container">
    <div class="working_card">
        <img src="assets/images/icons/svgexport-6.png">
        <p class="working_number">01</p>
        <p>Je fais mes achats en utilisant ma carte LoyaltyCard</p>
    </div>
    <hr>
    <div class="working_card">
        <img src="assets/images/icons/svgexport-8.png">
        <p class="working_number">02</p>
        <p>J'obtiens des points et des avantages</p>
    </div>
    <hr>
    <div class="working_card">
        <img src="assets/images/icons/svgexport-7.png">
        <p class="working_number">03</p>
        <p>J'utilise mes points en boutique pour avoir des avantages et réductions</p>
    </div>
</div>
</div>

<div class="few_offers" id="offers">
    <!-- comptage nombre d'offres de réductions -->
    <?php
    $stmt = $db->prepare("SELECT id FROM discounts");
    $stmt->execute();
    $stmt = $stmt->rowCount()
    ?>
    <h3><?=$stmt ?> Offres partenaires disponibles </h3>
    <h5>Achats après achats, cummulés des points</h5>
    <div class="discoun_container">
        <?php
        $stmt = $db->prepare("SELECT brieve_description, store_image FROM discounts");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $key => $discount){
            echo'';
        }
        ?>
    </div>

</div>


<?php include ('./includes/message.php');?>
    </body>
</html>
