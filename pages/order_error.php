<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>

    <meta charset="utf-8">
    <?php include "../includes/head.php"?>
    <title>Erreur!</title>
  </head>
  <body>
  <?php
  include('../includes/message.php');
  include ("../includes/header.php");
  ?>


<div class="center pt-32">

<p class="primary text-6xl text-center font-bold">Mince, une erreur est survenue</p>

<div class="inner text-center pl-10 pr-10">

<p class="secondary text-4xl text-gray-400">votre payment n'a pas pu aboutir suite à une erreur de payment</p>

</div>

<div class="flex flex justify-center pt-10">
<img class="object-contain h-64 "src="../assets/images/animated/error.gif">
</div>
</p>


</div>




  </body>
</html>
