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

    <title>Nouveau Produit</title>
</head>

<body id="body">

<div class="container flex  h-screen pr-16">
    <?php include "../includes/sidebar.php"; ?>

    <div class="main2 left-16">
        <div class="topbar">
            <h3>Ajouter un nouveau produit</h3>
        </div>
        <div class="main_container pt-24 pl-8">
            <div class="left_area w-5/6">
                <input type="text" placeholder="Nom du produit" class="w-full p-3 placeholder-gray-400 rounded mb-3">
                <div class="rounded-t bg-gray-300 p-2">
                    <h1>Description du produit</h1>
                </div>
                <textarea class="w-full border-gray-400 border-solid border-2" name="description" rows="10" placeholder="Inserer "></textarea>

                <div>

                </div>

            </div>
            <div class="right_area">

            </div>
        </div>

    </div>
</div>


</body>

</html>
