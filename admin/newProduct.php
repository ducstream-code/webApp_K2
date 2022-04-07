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
        <div class="main_container pt-24 pl-8 pr-8 flex justify-between">
            <div class="left_area w-4/5 mr-4">
                <input type="text" placeholder="Nom du produit" class="w-full p-3 placeholder-gray-300 rounded mb-3">
                <div class="rounded-t bg-gray-300 p-2">
                    <h1>Description du produit</h1>
                </div>
                <textarea class="w-full border-gray-400 border-solid border-2" name="description" rows="10"
                          placeholder="Inserer une description complete du produit "></textarea>
                <div class="text-sm bg-gray-300 -mt-3 p-[2px]">Nombre de mots: <span>0</span></div>

                <div class="mt-12 bg-white">
                    <div class="p-2 border-solid border-gray-700 border-[1px]"> Données produit:</div>
                    <div class="border-solid border-gray-700 border-[1px] p-4">
                        <div class="flex mb-2">
                            <p class="mr-6">Tarif régulier(€)</p>
                            <input class="rounded border-solid border-gray-700 border-[1px]" type="number" step="0.01">
                        </div>
                        <div class="flex mb-2">
                            <p class="mr-6">Stock</p>
                            <input class="rounded border-solid border-gray-700 border-[1px]" type="number">
                        </div>
                        <div class="flex mb-2">
                            <p class="mr-6">UGS (Unité Gestion de Stock)</p>
                            <input class="rounded border-solid border-gray-700 border-[1px]" type="text">
                        </div>


                    </div>

                </div>


            </div>
            <div class="right_area w-1/5 ">
                <div class="bg-white border-solid border-gray-500 border-[1px] mb-5">
                    <div class="border-solid border-gray-500 border-b-[1px] mb-2 p-2"><p class="text-center text-xl font-bold">Publier</p></div>
                    <div class="flex flex-row-reverse "><button class="rounded p-2 bg-blue-500 w-full m-2">Publier</button></div>
                </div>

                <div class="bg-white border-solid border-gray-500 border-[1px]">
                    <div class="border-solid border-gray-500 border-b-[1px] mb-4"><p>Images</p></div>
                    <div class="p-2">
                        <label for="file1">Image 1</label>
                        <input id="file1" class="mb-2"  type="file" placeholder="Image 1">
                        <label for="file2">Image 2</label>
                        <input id="file2" class="mb-2"  type="file" placeholder="Image 2">
                        <label for="file3">Image 2</label>
                        <input id="file3" class="mb-2" type="file" placeholder="Image 3">
                        <label for="file4">Image 4</label>
                        <input id="file4" class="mb-2" type="file" placeholder="Image 4">
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


</body>

</html>
