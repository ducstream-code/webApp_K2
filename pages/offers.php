<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
include('../includes/message.php');
include ("../includes/header.php");
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../css/offers.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>

    <title>Nos offres</title>
</head>
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>
?>
<body>

<div id="offers_bubble" class="offers_bubble_container">
    <div class="offer_container">
        <div class="offer_header" onclick="bigBubble()">
            <h1>Offres</h1>
            <h1><ion-icon id="arrow_offers" name="chevron-down-outline"></ion-icon></h1>
        </div>


    </div>

<script>
    function bigBubble(){
        let bubble = document.getElementById('offers_bubble')
        let arrow = document.getElementById('arrow_offers')
        arrow.name='chevron-up-outline'
        bubble.style.top='0'
        bubble.style.zIndex='200'
        bubble.style.position='absolute'
        bubble.style.marginTop='0'
        bubble.style.borderRadius='0px'
        bubble.style.height='100%'
        document.querySelector('#offers_bubble .offer_header').setAttribute("onClick", "littleBubble()");
    }

    function littleBubble(){
        let bubble = document.getElementById('offers_bubble')
        let arrow = document.getElementById('arrow_offers')
        arrow.name='chevron-down-outline'
        bubble.style.top='0'
        bubble.style.zIndex='0'
        bubble.style.position='relative'
        bubble.style.marginTop='200px'
        bubble.style.borderRadius='45px'
        bubble.style.height='75px'
        document.querySelector('#offers_bubble .offer_header').setAttribute("onClick", "bigBubble()");
    }
</script>
</body>
</html>

