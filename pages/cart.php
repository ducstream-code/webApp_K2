<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
$id = $_GET['p'];
$uid = $_COOKIE['id'];



//get product info
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


    <title><?=$product['name'] ?></title>
</head>

<body>

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
            <a href="#">Poursuivre l'achat -></a>
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
            <tr class="p-2 ">
                <td class="text-center"><button class="align-middle text-2xl mr-3"><ion-icon name="close-circle-outline"></ion-icon></button></td>
                <td class="flex"><img class="h-[80px]" src="<?=$productInfo['image'] ?>"></td>
                <td class="text-center"><?=$productInfo['name'] ?></td>
                <td class="text-center"><?=$productInfo['price'] ?></td>
                <td class="text-center"><div><button class="align-middle text-2xl mr-3"><ion-icon name="remove-circle-outline"></ion-icon></button><?=$cart['quantity'] ?><button class="align-middle text-2xl ml-3"><ion-icon name="add-circle-outline"></ion-icon></button></div></td>
                <td class="text-center"><?=$productInfo['price']*$cart['quantity'] ?>€</td>

            </tr>

        <?php
        }
        ?>
        </tbody>
    </table>

</div>
</body>
</html>