<?php
include ('../includes/db.php');
include ('../includes/check_session.php');

$email = $_GET['email'];
$hash = $_GET['hash'];

$stmt = $db->prepare("SELECT hash FROM reset_mail WHERE email = :email");
$stmt->bindParam(':email',$email);
$stmt->execute();
$ans = $stmt->fetch();

if(!$ans){
    header('Location: ../index.php');
    exit();
}

if($hash != $ans['hash']){
    header('Location: ../index.php');
    exit();
}

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
    <script src="../js/changePassword.js"


    <title>Change password</title>
</head>

<body class="">
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>

<div class="relative pt-24 bg-gray-600 h-screen flex justify-center place-items-center flex-col">
    <div>
        <input type="password" id="password" class="p-2 w-96 rounded-l bg-white" placeholder="Nouveau mot de passe">
        <button class="bg-green-300 p-2 rounded-r" onclick="changePass(<?=$_GET['hash']?>)" >Changer le mot de passe</button>
    </div>
    <h1 class="text-2xl text-red-400 text-center" id="passRes"></h1>

</div>

</body>
</html>
