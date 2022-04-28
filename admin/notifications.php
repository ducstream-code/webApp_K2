<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../includes/db.php';

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <?php include '../includes/head.php' ?>
    <script src="../js/admin/contact.js"></script>

    <title>Contact</title>
</head>

<body onload="loadContact()" id="body">

<div class="container flex  h-screen pr-16">
    <?php include "../includes/sidebar.php";

    ?>

    <div class="main2 left-16 bg-gray-900 h-full">
        <div class="topbar">
            <h3>Notifications</h3>
            <div class="actions">


            </div>
        </div>
        <div class="wrap p-24 flex justify-center place-items-center">
            <form class="bg-gray-500/50 w-96  rounded-xl p-5 flex flex-col" method="post" action="../php/admin/sendPush.php">
                <h1 class="text-white text-center text-2xl font-semibold mb-8">Envoie de notification push</h1>

                <label class="text-white font-semibold mb-2" for="message">Message</label>
                <textarea class="p-2 bg-gray-800 rounded" cols="10" rows="5" type="text" name="message" id="message" placeholder="Message pour tout le monde"></textarea>
                <div class="flex justify-center mt-5">
                <input type="submit" class="bg-gray-600 p-4 rounded-2xl max-w-[100px]">
                </div>

            </form>
        </div>
    </div>
</div>


</body>

</html>
