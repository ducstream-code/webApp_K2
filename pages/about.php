<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <script src="../external/tailwind.js"></script>
    <link rel="stylesheet" href="../css/about.css">
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>


    <title>A propos</title>
</head>

<body>
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>

<div class="global pt-24">
    <p class="title">Qui somme nous ?</p>

    <div class="greyZone">
        <p class="mainText">
            Précurseur, Christian Goaziou a contribué à installer durablement le concept de cashback en France.
            En 2006, il est le créateur d’un outil révolutionnaire : iGraal, qui s’installe directement sur son navigateur web et permet d’économiser sur tous ses achats en ligne.
            En 10 ans, 3 versions du site internet, 2 design d'application mobile, 120 employés et 523945 cafés plus tard, iGraal est devenu une success story à la française, comptant 5000 sites partenaires en Europe et plus de 6 millions de membres.
            Aujourd’hui, notre fierté, chez iGraal, c’est d’être n°1 du cashback en France et n°2 en Allemagne. Mais nous travaillons encore et toujours à réaliser une vision encore plus ambitieuse de notre service.
            Soyez prêt !
        </p>
    </div>

</div>

<div class="greenZone pt-6">

    <p class = "team">UNE FINE EQUIPE...</p>


    <div class="centered">

        <div>


            <img class="w-64" src="../assets/images/logos/pp1.png" alt="">
            <p class = "names">Eliott</p>
        </div>

        <div>

            <img class="w-64" src="../assets/images/logos/pp2.png" alt="">
            <p class = "names">Aurelien</p>


        </div>

        <div>

            <img class="w-64" src="../assets/images/logos/pp3.png" alt="">
            <p class = "names">Mathieu</p>

        </div>

    </div>


</div>
</body>
</html>
