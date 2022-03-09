<?php

include "../includes/db.php";

$uid = $_GET['uid'];
$total = 0;
$stmt = $db->prepare("SELECT id_product,quantity FROM cart WHERE id_user = :uid");
$stmt->bindParam(':uid',$uid);
$stmt->execute();
$cartP = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($cartP as $key => $cart){
    $stmt = $db->prepare("SELECT price from products WHERE id = :pid");
    $stmt->bindParam(":pid",$cart['id_product']);
    $stmt->execute();
    $res = $stmt->fetch();

    $total += ($cart['quantity']*$res['price']);

}
echo "Total: ".$total;