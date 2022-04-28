<?php
include ('../includes/db.php');
include ('../includes/check_session.php');
$id = $_GET['p'];
$uid = $_COOKIE['id'];
if(!isset($id) || empty($id)){
    header('Location: ../index.php');
}


//get product info

$stmt = $db->prepare("SELECT id, name, price,image,image2,image3 FROM products WHERE id = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();
$product = $stmt->fetch();
?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="icon" type="image/png" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="../external/tailwind.js"></script>
    <script src="../js/product.js"></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ab43238c-b4c8-4dce-8375-df0d80725789",
            });
        });
    </script>

    <title><?=$product['name'] ?></title>
</head>

<body id="body" ">

<?php
include ("../includes/header.php");
include('../includes/message.php');
?>
<div class="container w-screen grid grid-cols-2 top-24 relative pt-24">
    <div class="product_image w-[500px] flex flex-col justify-center">
        <img src="<?=$product['image'] ?>" alt="img_product" class="h-96 object-contain">
        <div class="w-[500px] flex mt-24">
            <img src="<?=$product['image2'] == NULL ? '../assets/images/default/product_placeholder.png' : $product['image2'] ?>" alt="img_product" class="w-1/3 ml-4" >
            <img src="<?=$product['image3'] == NULL ? '../assets/images/default/product_placeholder.png' : $product['image3'] ?>" alt="img_product" class="w-1/3 ml-4">
            <img src="<?=$product['image4'] == NULL ? '../assets/images/default/product_placeholder.png' : $product['image4'] ?>" alt="img_product" class="w-1/3 ml-4">
        </div>
    </div>
    <div class="product_details  font-bold">
        <h1 class=" text-5xl"><?=$product['name'] ?></h1>
        <h1 class="text-teal-400 text-4xl mt-10"><?=$product['price'] ?></h1>
        <h1 class=" text-3xl mt-10 font-normal">Commandez maintenant et recevez ce produit d'ici 7 jours</h1>
        <div class="centerer flex justify-center mt-32">
            <?= checkLoggedUser() ? '<button onclick="addToCart('.$uid.','.$product['id'].')"  class="xl:rounded-3xl w-96 bg-blue-400 p-4 " id="addToCartButton">Ajouter au panier</button>' : '<button onclick="window.location=\'../pages/login.php\'" class="xl:rounded-3xl w-96 bg-blue-400 p-4 ">Se connecter</button>' ?>

        </div>
    </div>


</div>
<script>

</script>
</body>
</html>

