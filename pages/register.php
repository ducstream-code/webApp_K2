<?php
include ('../includes/check_session.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>



    <title>Inscriptions</title>
</head>

<body>
<?php
include ("../includes/header.php");
?>



    <div class="login_type" id="login_type_container">
        <div class="card" style="width: 18rem;">
            <img src="/assets/images/logos/logo-500px.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Inscription Entreprise</h5>
                <p class="card-text">Si vous possedez une entreprise et que vous avez déjà un compte, vous pouvez vous connecter</p>

            </div>
            <div class="card-footer">
                <small class="text-muted">A partir de 9.99€</small>
            </div>
        </div>
        <div class="card" style="width: 18rem;" onclick="growFormUser()">
            <img src="/assets/images/logos/logo-500px.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Inscription client</h5>
                <p class="card-text">Créez vous dès maintenant votre compte client</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Souscrivez gratuitement</small>
            </div>
        </div>
    </div>


<form action="../php/register.php" method="post" class="user_register_form" id="user_register_form" >

    <h1 class="user_form_title">S'inscrire chez Loyalty Card</h1>
    <div class="names">
        <input type="text" name="firstname" placeholder="Prénom">
        <input type="text" name="name" placeholder="Nom">
    </div>
    <input class="user_username" type="text" name="username" placeholder="Nom d'utilisateur">
    <input class="user_email" type="email" name="email" placeholder="Email">
    <input class="user_password" type="password" name="password" placeholder="Mot de passe">
    <div class="checkbox_align">
        <input type="checkbox" id="user_conf">
        <label style="color: white" for="user_conf">J'ai lu et j'accepte les conditions générales d'utilisation et la Charte de confidentialité, et je reconnais avoir plus de 18 ans.</label>
    </div>
    <div class="user_from_buttons">
        <input class="submit" type="submit" placeholder="Créer mon compte gratuitement">
        <button class="cancel_button" type="button" onclick="lowFormUser()">Annuler</button>
    </div>
    </form>


</div>
<?php include ('../includes/message.php');?>
</body>
<script src="/js/register.js"></script>
</html>
<!---
 <div class="names">
        <input type="text" placeholder="Prénom">
        <input type="text" placeholder="Nom">
    </div>

        <input class="user_email" type="email" placeholder="Email">
        <input class="user_password" type="password" placeholder="Mot de passe">
    <div class="checkbox_align">
        <input type="checkbox" id="user_conf">
        <label style="color: white" for="user_conf">J'ai lu et j'accepte les conditions générales d'utilisation et la Charte de confidentialité, et je reconnais avoir plus de 18 ans.</label>
    </div>
    <input class="submit" type="submit" placeholder="Créer mon compte gratuitement">
