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
    <?php include '../includes/head.php'?>
    <script src="../js/admin/contact.js"></script>

    <title>Contact</title>
</head>

<body onload="loadContact()">

<div class="container flex  h-screen pr-16">
    <?php include "../includes/sidebar.php";

    ?>

    <div class="main2 left-16">
        <div class="topbar">
            <h3>Contact</h3>
            <div class="actions">

            </div>
        </div>
        <div class="wrap p-24">
            <div class="flex justify-between bg-white p-4 place-items-center rounded-t-2xl shadow">
                <h1>Demandes de contact</h1>
                <button class="rounded bg-white border-solid border-[2px] border-[#7764E4] p-2 text-[#7764E4] hover:bg-[#7764E4] hover:text-white">Export Data</button>
            </div>
            <table class="">
                <thead class="h-16" style="background-color: #F1F3F9">
                    <th class="text-sm text-gray-600 font-semibold">Open</th>
                    <th class="text-sm text-gray-600 font-semibold">Name</th>
                    <th class="text-sm text-gray-600 font-semibold">Date</th>
                    <th class="text-sm text-gray-600 font-semibold">Email</th>
                    <th class="text-sm text-gray-600 font-semibold">Status</th>
                    <th class="text-sm text-gray-600 font-semibold"></th>
                </thead>
                <tbody id="tab_body">





                </tbody>
            </table>
            <div class="table_footer flex flex-row justify-end bg-white rounded-b-2xl p-4 shadow">
                <ion-icon class="text-3xl text-[#8898AA]" onclick="prevPage()" name="arrow-back-circle-outline"></ion-icon>
                <ion-icon onclick="nextPage()" class="text-3xl text-[#8898AA]" name="arrow-forward-circle-outline"></ion-icon>

            </div>
        </div>
    </div>
</div>



</body>

</html>
