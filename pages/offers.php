<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
include('../includes/message.php');
include ("../includes/header.php");
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
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
        <div class="offer_header" onclick="big_bubble()">
            <h1>Offres</h1>
            <h1><ion-icon name="chevron-down-outline"></ion-icon></h1>
        </div>

        <div class="offers">
            <?php
            $stmt = $db->prepare("SELECT briev_description, store_image FROM discounts LIMIT 6");
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res as $key => $discount){
            ?>
            <div class="offer_card">
                <div class="offer_image">
                    <img src="..<?=$discount['store_image']?>>">
                </div>
                <div class="offer_footer">
                    <?= $discount['briev_description']?>
                </div>
            </div>
            <?php
            }
            ?>

        </div>

    </div>

</div>
<div id="shop_bubble" class="offers_bubble_container">
    <div class="offer_container">
        <div class="offer_header">
            <h1>Boutique</h1>
            <h1><ion-icon name="chevron-down-outline"></ion-icon></h1>
        </div>

    </div>

</div>

<div class="shop_container"></div>

<script>
    function big_bubble() {
        let bubble = document.getElementById('offers_bubble');
        let bubble_inside = document.querySelector('.offer_container');
        let offers = document.querySelector('.offers')
        bubble.style.marginTop = '70px';
        bubble_inside.style.marginTop = '70px';
        bubble.style.height='300px';
        bubble_inside.style.height='300px';
        offers.style.display='flex';
        document.querySelector('#offers_bubble .offer_header').setAttribute("onClick", "little_bubble()");
    }

    function little_bubble() {
        let bubble = document.getElementById('offers_bubble');
        let bubble_inside = document.querySelector('.offer_container');
        let offers = document.querySelector('.offers')

        bubble.style.marginTop = '200px';
        bubble_inside.style.marginTop = '200px';
        bubble.style.height='75px'
        bubble_inside.style.height='75px'
        offers.style.display='none';

        document.querySelector('#offers_bubble .offer_header').setAttribute("onClick", "big_bubble();");
    }
</script>
</body>
</html>

