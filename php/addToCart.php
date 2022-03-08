<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../includes/db.php";

$uid = $_GET['uid'];
$pid = $_GET['pid'];

$stmt = $db->prepare("SELECT id,quantity FROM cart WHERE id_user = :uid AND id_product = :pid ");
$stmt->bindParam(':uid',$uid);
$stmt->bindParam(':pid',$pid);
$stmt->execute();
$res = $stmt->fetch();


if($res){
    $newquantity = $res['quantity'] + 1;

    $stmt=$db->prepare("UPDATE cart SET quantity = :newQuantity WHERE id_user = :uid AND id_product = :pid");
    $stmt->bindParam(':newQuantity',$newquantity);
    $stmt->bindParam(':uid',$uid);
    $stmt->bindParam(':pid',$pid);
    $stmt->execute();
}else {

    $stmt = $db->prepare("INSERT INTO cart (id_user,id_product) VALUES (:uid, :pid)");
    $stmt->bindParam(':uid', $uid);
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();
}
