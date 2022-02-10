<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="/css/offers.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <title>Nos offres</title>
</head>

<body>
<div class="offers_container" id="offers_container">
    <div class="offers_header" onclick="littleBubble()">
        <h1>Offres</h1>
        <h1><ion-icon id="arrow_offers" name="chevron-up-outline"></ion-icon></h1>
    </div>
    <hr>
    <div class="offers_sort_display" id="offers_sort_display1">
        <div class="sort_container">
            <input class="sort_search" type="text" placeholder="Recherche">
            <h2>Catégories:</h2>
            <div class="categories_container">
            <button class="categorie">Alimentation</button>
            <button class="categorie">Voyage</button>
            <button class="categorie">Mode</button>
            <button class="categorie">Automobile</button>
            <button class="categorie">Entretien</button>
            </div>

        </div>
        <div class="offers_display">
                <?php
                $stmt = $db->prepare("SELECT briev_description, store_image FROM discounts LIMIT 6");
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($res as $key => $discount){
                    ?>
                    <div class="offer">
                        <img src="<?=$discount['store_image'] ?>">
                        <hr>
                        <h3><?=$discount['briev_description'] ?></h3>
                    </div>
                    <?php
                }
                ?>

        </div>
    </div>
</div>
<?php
include ("../includes/header.php");
include('../includes/message.php');
?>
<div class="diagonal-box">
    <div class="diagonal_box_content">
        <h1>Une envie ? Un produit ou une offre pour vous satisfaire.</h1>
    </div>
</div>

<div class="first_section_container">
    <div class="first_section">
        <h1>Les offres partenaires LoyaltyCard</h1>
        <div><hr></div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Avec loyalty card, nous vous proposons de nombreuses offres partenaires</h4>
        </div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Des réductions, des produits offerts, des avantages, et plein de points positifs avec notre carte </h4>
        </div>
        <div class="first_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>A travers toute la france vous pourrez profiter de ces avantages.</h4>
        </div>
        <div class="button_container">
            <button class="section_button" onclick="bigBubble()">Voir nos offres</button>
        </div>

    </div>
</div>

<div class="second_section_container">
    <div class="second_section">
        <h1>La boutique LoyaltyCard</h1>
        <div><hr></div>
        <div class="second_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>LoyaltyCard c'est aussi une boutique pour toutes vos envies</h4>
        </div>
        <div class="second_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>Nous vous proposons des produits de catégories variées </h4>
        </div>
        <div class="second_section_paragraph">
            <img src="../assets/images/icons/check.svg">
            <h4>blablablablablablablablablablablablablablablablablabla.</h4>
        </div>
        <div class="button_container">
            <button class="section_button" onclick="">Voir la boutique</button>
        </div>

    </div>
</div>


<!--
<div id="offers_bubble" class="offers_bubble_container">
    <div class="offer_container">
        <div class="offer_header" onclick="bigBubble()">

        </div>


    </div>
-->
<script>


    function bigBubble(){

        let bubble = document.getElementById('offers_container')
        let arrow = document.getElementById('arrow_offers')
        let data = document.getElementById('offers_sort_display1')
        data.style.display='flex'
        bubble.style.zIndex='200'
        bubble.style.height='100%'

    }

    function littleBubble(){
        let bubble = document.getElementById('offers_container')
        let arrow = document.getElementById('arrow_offers')
        let data = document.getElementById('offers_sort_display1')
        data.style.display='none'
        bubble.style.height='0px'
        bubble.style.zIndex='-1'

    }
</script>
</body>
</html>

