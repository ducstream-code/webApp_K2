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
    <script src="../../js/offer_page.js"></script>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>
    <title>Nos offres</title>
</head>

<body id="body" onload="loadOffers(),loadProducts()">
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
            <div class="offer_page change">
                <button onclick="moreOffers()">page suivante</button>
                <button onclick="lessOffers()">page précedente</button>
            </div>
        </div>
        <div class="offers_display animate__animated animate__backInDown" id="offers_display">
        //ajax generated

        </div>
    </div>
</div>

<div class="shop_container" id="shop_container">
    <div class="shop_header" onclick="shopLittleBubble()">
        <h1>Offres</h1>
        <h1><ion-icon id="arrow_offers" name="chevron-up-outline"></ion-icon></h1>
    </div>
    <hr>
    <div class="shop_sort_display" id="shop_sort_display1">
        <div class="shop_sort_container">
            <input class="shop_sort_search" type="text" placeholder="Recherche">
            <h2>Catégories:</h2>
            <div class="shop_categories_container">
                <button class="shop_categorie"><ion-icon name="fast-food-outline"></ion-icon> Alimentation</button>
                <button class="shop_categorie">Voyage</button>
                <button class="shop_categorie">Mode</button>
                <button class="shop_categorie">Automobile</button>
                <button class="shop_categorie">Entretien</button>
            </div>
            <button onclick="moreProducts()">page suivante</button>
            <button onclick="lessProducts()">page précedente</button>
        </div>
        <div class="shop_display animate__animated animate__backInDown" id="shop_display">
            //ajax generated


        </div>
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
            <h4>isla de muerta.</h4>
        </div>
        <div class="button_container">
            <button class="section_button" onclick="shopBigBubble()">Voir la boutique</button>
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

        function show(){
            data.style.display='flex'

        }

       const myTimeout = setTimeout(show, 500);
        bubble.style.zIndex='1'
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

    function shopBigBubble(){

        let bubble = document.getElementById('shop_container')
        let arrow = document.getElementById('arrow_offers')
        let data = document.getElementById('shop_sort_display1')

        function show(){
            data.style.display='flex'

        }

        const myTimeout = setTimeout(show, 500);
        bubble.style.zIndex='1'
        bubble.style.height='100%'


    }

    function shopLittleBubble(){
        let bubble = document.getElementById('shop_container')
        let arrow = document.getElementById('arrow_offers')
        let data = document.getElementById('shop_sort_display1')
        data.style.display='none'
        bubble.style.height='0px'
        bubble.style.zIndex='-1'

    }
</script>
</body>
</html>

