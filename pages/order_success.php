<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>
    <meta charset="utf-8">
    <?php include "../includes/head.php"?>
    <title>Succes</title>
</head>
<body>
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>


<div class="center pt-32">

    <p class="primary text-5xl text-center font-bold">Merci, votre commande a bien été effectuée !</p>

    <div class="inner text-center pl-10 pr-10">

        <p class="secondary text-3xl text-gray-400">merci pour votre confiance, votre commande sera traitée dans les plus brefs délais</p>

    </div>

    <div class="flex flex justify-center pt-10">
        <img class="object-contain h-64 "src="../assets/images/animated/done.gif">
    </div>
    </p>


</div>




</body>
</html>
