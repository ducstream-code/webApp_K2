<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
$id = $_COOKIE['id'];

$stmt =$db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();
$res = $stmt->fetch();
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">


    <title>Document</title>
    <script src="../external/tailwind.js"></script>
    <script src="../js/profile.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap');
        .amount{
            font-family: 'Oxygen';
            font-style: normal;
            font-weight: 700;
            font-size: 150px;
            line-height: 253px;
            background: linear-gradient(145.97deg, #61C38F 22.05%, #100A57 33.12%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-fill-color: transparent;
        }
    </style>
</head>

<body class="">
<?php
include('../includes/message.php');
include ("../includes/header.php");
?>
<div class="p-32">
    <div class="flex flex-row p-2 justify-between">
        <div class="w-1/2">
            <img class="" src="../assets/images/icons/Card.png" alt="">
        </div>

        <div class="flex w-1/2 flex-col gap-y-24">
            <div class="flex flex-col ">
                <label class="text-xl pt-6 pb-2" for="email">E-mail <span class="text-2xl text-red-700 font-semibold" id="mailRes"></span> <span class="text-2xl text-green-700 font-semibold" id="mailRes2"></span></label>
                <div class="flex gap-x-3">
                    <input id="email" type="email"  class="pl-6 rounded-xl p-5 bg-[#EFEFEF] shadow-xl w-3/5 text-2xl font-thin " value="<?= $res['email'] ?>">
                    <div id="mail_buttons" class="flex">
                        <img class=" object-contain" style="height: 60px" src="../assets/images/icons/check.png" onclick="validateEmail(<?=$_COOKIE['id']?>)" alt="">

                    </div>
                </div>

            </div>

            <div class="flex flex-col">
                <label class="text-xl pb-2" for="password">Mot de passe <span class="text-2xl text-red-700 font-semibold" id="passRes"></span> <span class="text-2xl text-green-700 font-semibold" id="passRes2"></span></label>
                <div class="flex gap-x-3">
                    <input type="password" id="password"  class="pl-6 rounded-xl p-5 bg-[#EFEFEF] shadow-xl w-3/5 text-3xl font-thin " value="supermdp">
                    <img class=" object-contain" style="height: 60px" src="../assets/images/icons/check.png" onclick="validatePassword(<?=$_COOKIE['id']?>)" alt="">
                </div>

            </div>

        </div>
    </div>

    <p class="amount pt-6 pl-1"><?=$res['solde']?> LC</p>
</div>

</body>
</html>
