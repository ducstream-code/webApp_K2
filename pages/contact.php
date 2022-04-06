<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../includes/db.php');
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
  <title>Contact</title>
  <link href="../css/contact.css" rel="stylesheet">
    <script src="../js/contact.js"></script>
</head>
<body>


  <?php
  include ('../includes/check_session.php');

  include('../includes/header.php');

   ?>


  <div class="background">
    <div class="container">
      <div class="screen">
        <div class="screen-body">
          <div class="screen-body-item left">
            <div class="app-title">
              <span id="formRes">CONTACTEZ
              NOUS</span>
            </div>
            <div class="app-contact">Numéro : +33 12 34 56 78 <br> Addresse : 8 RUE DE LA VILLE 18600 </div>
          </div>
          <div class="screen-body-item">
            <div class="app-form">
              <div class="app-form-group">
                <input class="app-form-control" id="name" placeholder="VOTRE NOM">
              </div>
              <div class="app-form-group">
                <input class="app-form-control" id="email" placeholder="EMAIL">
              </div>
              <div class="app-form-group message">
                <input class="app-form-control" id="message" placeholder="VOTRE MESSAGE">
              </div>
              <div class="app-form-group buttons">
                <button class="app-form-button" onclick="sendForm()">SEND</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script>

</script>
</body>
</html>
