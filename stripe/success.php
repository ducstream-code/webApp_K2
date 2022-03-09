<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
$id = $_GET['p'];
$uid = $_COOKIE['id'];
$_SESSION['id'] = $uid;
checkLoggedUser() ? '' : header('Location: ../index.php')
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="../external/tailwind.js"></script>
    <script src="../js/cart.js"></script>

    <title>Panier</title>
</head>

<body id="body">

<?php
include ("../includes/header.php");
include('../includes/message.php');
?>
<div class="container w-screen  top-24 relative ">
    <h1>Success</h1>
</div>

</body>
</html>
