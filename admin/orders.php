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


            <h3 class="text-2xl mt-16"><Commandes></Commandes></h3>
            <div class="customers_table_actions pr-24 ">
                <div class="customers_table_left flex w-full place-content-between mb-8">
                    <input class="h-10 w-1/2 border-solid border-2 border-gray-300" type="text">
                    <button class="bg-blue-400 rounded p-2" onclick="showSlideOver()">Create an order</button>
                </div>
            </div>
            <table class="orders_table customers_table" cellspacing="0" cellpadding="0">
                <thead>
                <th class="text-left">Commande</th>
                <th>Display</th>
                <th>Date</th>
                <th>Etat</th>
                <th>Total</th>
                </thead>
                <tbody id="table_body">
                <?php
                    $stmt = $db->prepare("SELECT * FROM orders");
                    $stmt->execute();
                    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($orders as $key => $order){
                ?>
                    <tr>
                        <td class="text-left pl-12"><?= $order['id'] ?></td>
                        <td class="text-center"><button><ion-icon name="eye-outline"></ion-icon></button></td>
                        <td class="text-center"><?=$order['date']?></td>
                        <td class="text-center"><?= $order['status'] ?></td>
                        <td class="text-center"><?= $order['total'] ?></td>

                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="slidershowcontainer" class="fixed inset-0 overflow-hidden hidden " aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div id="" class="absolute inset-0 overflow-hidden ">
        <!--
          Background overlay, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity " aria-hidden="true"></div>
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
            <!--
              Slide-over panel, show/hide based on slide-over state.

              Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-full"
                To: "translate-x-0"
              Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-0"
                To: "translate-x-full"
            -->
            <div id="sliderMain" class=" pointer-events-auto relative w-screen max-w-md transform transition ease-in-out duration-500 sm:duration-700">
                <!--
                  Close button, show/hide based on slide-over state.

                  Entering: "ease-in-out duration-500"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-500"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                    <button  type="button" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="sr-only">Close panel</span>
                        <!-- Heroicon name: outline/x -->
                        <svg onclick="hideSlideOver()" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                    <div class="px-4 sm:px-6 flex space-x-4 fixed z-50 bg-white w-full">
                        <h2 class="text-lg font-medium text-gray-900  " id="slide-over-title">Add Company</h2>
                    </div>
                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                        <!-- Replace with your content -->
                        <div class="absolute inset-0 px-4 sm:px-6 mt-8">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="clientName" placeholder="prénom">
                            <input type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 "  id="clientFirstname" placeholder="nom de famille">
                            <input type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="clientEmail" placeholder="email">
                            <input type="password" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="clientPassword" placeholder="Password">
                            <button class="p-1 rounded bg-blue-400 mr-4 w-full" onclick="addAccount()">Create</button>
                            <div id="addCompanyResponse" class="text-2xl text-red-500 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="order_detail w-[600px]   z-50 bg-gray-200">
    <div class="order_detail_header w-[600px]  h-16 bg-gray-100">
        <h1>Commande n°</h1><h1>
</h1>    </div>
    <h1>Détails de Livraison</h1>
    <div class="order_info w-[600px] p-4">
        <h1>Adresse</h1>
        <h1>Téléphone</h1>
        <h1>Email</h1>
    </div>
    <div class=" order_info_table w-[600px] p-4">
        <table class="w-full">
            <thead>
            <th class="text-left">Produit</th>
            <th>Quantité</th>
            <th class="text-right">Total</th>
            </thead>
            <tbody>
            <tr>
                <td>Tshirt</td>
                <td class="text-center">3</td>
                <td class="text-right">78€</td>
            </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="bg-gray-600 w-screen h-screen fixed z-20 top-0 opacity-25"></div>
</body>

</html>