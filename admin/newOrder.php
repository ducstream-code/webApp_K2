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
    <? include '../includes/head.php'?>
    <script src="../js/admin/orders.js"></script>


    <title>Ajouter</title>
</head>

<body>

<div class="container flex  h-screen pr-16">
    <?php include "../includes/sidebar.php"; ?>

    <div class="main left-16">
        <div class="topbar">
            <h3>Ajouter</h3>
            <div class="actions">

            </div>
        </div>
        <div class="wrap mt-24">
        <h1 class="text-2xl">Nouvelle commande</h1>
            <div class="newOrderContainer flex ">
                <div class="w-full h-96 bg-red-500 p-8">
                    <h1>Détail de la commande</h1>
                </div>
            </div>

        </div>
    </div>
</div>


</body>

</html>