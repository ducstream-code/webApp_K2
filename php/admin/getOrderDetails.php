<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../../includes/db.php";

$id_order = $_GET['id_order'];

$stmt = $db->prepare("SELECT id, address, phone, mail, id_customer,city,postal_code FROM orders WHERE id = :id_order");
$stmt->bindParam(':id_order', $id_order);
$stmt->execute();
$customerInfo = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT name, firstname FROM users WHERE id = :id_customer");
$stmt->bindParam(':id_customer', $customerInfo['id_customer']);
$stmt->execute();
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

?>
    <div>
        <div class="order_detail_header w-[600px]  h-16 bg-gray-100 flex justify-between p-4">
            <h1>Commande n°<?=$customerInfo['id']  ?></h1>
            <button onclick="closeOrderDetail()"><ion-icon class="text-2xl"name="close-circle-outline"></ion-icon></button>
        </div>
        <h1>Détails de Livraison</h1>
        <div class="order_info w-[600px] p-4">

            <h1><?=$userInfo['name'] ?></h1>
            <h1><?=$userInfo['firstname'] ?></h1>
            <h1><?=$customerInfo['address'].', '.$customerInfo['city'].', '.$customerInfo['postal_code'] ?></h1>
            <h1>0<?=$customerInfo['phone'] ?></h1>
            <h1><?=$customerInfo['mail'] ?></h1>
        </div>
        <div class=" order_info_table w-[600px] p-4">
            <table class="w-full">
                <thead>
                <th class="text-left">Produit</th>
                <th>Quantité</th>
                <th class="text-right">Total</th>
                </thead>
                <tbody>
                <?php
$stmt = $db->prepare('SELECT * FROM ordered_product WHERE id_order = :id_order');
$stmt->bindParam(':id_order', $id_order);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $key => $order){

    $stmt = $db->prepare("SELECT name, price FROM products WHERE id = :id_product");
    $stmt->bindParam(":id_product",$order['id_product']);
    $stmt->execute();
    $product = $stmt->fetch();
?>
                <tr>
                    <td><?=$product['name'] ?></td>
                    <td class="text-center"><?=$order['quantity']?></td>
                    <td class="text-right"><?=$order['quantity']*$product['price'] ?></td>
                </tr>

<?php
}?>
                </tbody>
            </table>
        </div>

    </div>



