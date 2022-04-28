<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
$id = $_GET['p'];
$uid = $_COOKIE['id'];
$_SESSION['id'] = $uid;
checkLoggedUser() ? '' : header('Location: ../index.php')
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="../external/tailwind.js"></script>
    <script src="../js/cart.js"></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>
    <title>Panier</title>
</head>

<body id="body">

<?php
include ("../includes/header.php");
include('../includes/message.php');
?>
<div class="container w-screen  top-24 relative ">
    <div class="cart_header w-full h-[75px] flex place-items-center ">
        <h1 class="text-3xl">Panier</h1>
    </div>
    <div class="cart_header w-full h-[75px] bg-blue-400 border-l-[15px] border-blue-500 flex place-items-center pl-12 pt-2 pb-2 pr-12 justify-between">
        <h1 class="text-2xl">Vous pouvez commander maitenant pour recevoir au plus vite</h1>
        <div class="right_cart_header  h-full border-l-[1px] border-white pl-8 flex place-items-center ">
            <button class="text-2xl mb-8" onclick="showSlideOver(<?=$_COOKIE['id'] ?>)">Poursuivre l'achat -></button>
        </div>
    </div>

    <table class="w-full mt-16 ">
        <thead class="bg-gray-300 mb-8">
        <th class="bg-gray-300 p-4 text-center"></th>
        <th class="bg-gray-300 p-4 text-center"></th>
        <th class="bg-gray-300 p-4 text-center">Produit</th>
        <th class="bg-gray-300 p-4 text-center">Prix</th>
        <th class="bg-gray-300 p-4 text-center">Quantité</th>
        <th class="bg-gray-300 p-4 text-center">Total</th>
        </thead>
        <tbody class="mt-8">
        <?php
        $stmt = $db->prepare("SELECT * FROM cart WHERE id_user = :uid");
        $stmt->bindParam(':uid',$uid);
        $stmt->execute();
        $cartElement = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cartElement as $key => $cart){
            $stmt = $db->prepare("SELECT id,name,image,price FROM products WHERE id = :pid");
            $stmt->bindParam(':pid',$cart['id_product']);
            $stmt->execute();
            $productInfo = $stmt->fetch();
            ?>
            <tr id="cartLine_<?= $cart['id']?>" class="p-2 ">
                <td class="text-center"><button onclick="editCartProduct(<?= $cart['id']?>,<?= $cart['id_user']?>,<?= $cart['id_product']?>,'delete')" class="align-middle text-2xl mr-3"><ion-icon name="close-circle-outline"></ion-icon></button></td>
                <td class="flex"><img class="h-[80px]" src="<?=$productInfo['image'] ?>"></td>
                <td class="text-center"><?=$productInfo['name'] ?></td>
                <td id="price_<?= $cart['id']?>" class="text-center"><?=$productInfo['price'] ?></td>
                <td class="text-center"><div class="flex justify-center" "><button class="align-middle text-2xl mr-3" onclick="editCartProduct(<?= $cart['id']?>,<?= $cart['id_user']?>,<?= $cart['id_product']?>,'reduce')" ><ion-icon name="remove-circle-outline"></ion-icon></button><p id="quantity_<?=$cart['id']?>"> <?=$cart['quantity'] ?></p><button onclick="editCartProduct(<?= $cart['id']?>,<?= $cart['id_user']?>,<?= $cart['id_product']?>,'add')" class="align-middle text-2xl ml-3"><ion-icon name="add-circle-outline"></ion-icon></button></div></td>
                <td id="total_<?= $cart['id']?>" class="text-center"><?=$productInfo['price']*$cart['quantity'] ?>€</td>

            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>

</div >


<div id="slidershowcontainer" class="fixed inset-0 overflow-hidden hidden z-50 " aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
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
                        <h2 class="text-lg font-medium text-gray-900  " id="slide-over-title">Détails de commande</h2>
                    </div>
                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                        <!-- Replace with your content -->
                        <div class="absolute inset-0 px-4 sm:px-6 mt-8">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderAddress" placeholder="Adresse">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderCity" placeholder="Ville">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderPC"  placeholder="Code Postal">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderName" placeholder="Nom">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderFirstname" placeholder="Prénom">
                            <input  type="email" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderEmail" placeholder="email">
                            <input  type="text" class="rounded p-2  w-64 border-solid border-2 border-gray-500 placeholder-black mb-4 " id="orderPhone" placeholder="Phone">
                            <h1 id="order_total"></h1>
                            <button  class="p-1 rounded bg-blue-400 mr-4 w-full" onclick="goCheckout(<?=$_COOKIE['id']?>)">Procéder au paiement</button>
                            <div id="addCompanyResponse" class="text-2xl text-red-500 text-center"></div>
                            <div>
                                <h1 id="goToCheckoutRes" class="text-2xl text-red-500 text-center"></h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
