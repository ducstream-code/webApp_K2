<?php
include ('../includes/db.php');
include ('../includes/check_session.php');



?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <script src="../external/tailwind.js"></script>
    <script src="../js/"></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>


    <title>Change password</title>
</head>

<body class="">
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>

<div class="relative pt-24 bg-gray-600 h-screen flex justify-center place-items-center flex-col">
    <form method="post" action="../php/passwordReset.php">

        <input type="email" id="email" name="email" class="p-2 w-96 rounded-l bg-white" placeholder="Insérez votre mail">
        <input type="submit" class="bg-green-300 p-2 rounded-r" value="recevoir le mail de reinitialisation">

    </form>

</div>

</body>
</html>
