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


    <title>Commandes</title>
</head>

<body>

<div class="container flex  h-screen pr-16">
    <? include "../includes/sidebar.php";

    ?>

    <div class="main left-16">
        <div class="topbar">
            <h3>Commandes</h3>
            <div class="actions">

            </div>
        </div>
        <div class="wrap">


            <h3 class="text-2xl mt-16"></h3>
            <div class="customers_table_actions pr-24 ">
                <div class="customers_table_left flex w-full place-content-between mb-8">
                    <input class="h-10 w-1/2 border-solid border-2 border-gray-300" type="text">
                    <button class="bg-blue-400 rounded p-2" onclick="showSlideOver()">Create an order</button>
                </div>
            </div>
            <table class="orders_table customers_table" cellspacing="0" cellpadding="0">
                <thead>
                <th class="w-8"><input type="checkbox"></th>
                <th><ion-icon class="text-2xl" name="image-outline"></ion-icon></th>
                <th class="text-left">Nom</th>
                <th>Stock</th>
                <th>Prix</th>
                <th>Date</th>
                </thead>
                <tbody>
                <?php
                $stmt = $db->prepare("SELECT * FROM products");
                $stmt->execute();
                $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($prod as $key => $product){
                    ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td class="flex justify-center"><img class="w-10" src="<?=$product['image'] ?>"></td>
                        <td ><?=$product['name'] ?></td>
                        <td class="text-center"><?=$product['stock'] ?></td>
                        <td class="text-center"><?=$product['price'] ?></td>
                        <td class="text-center"><?=$product['date'] ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
