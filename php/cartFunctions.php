<?php
include "../includes/db.php";

$uid = $_GET['uid'];
$pid = $_GET['pid'];
$function = $_GET['fun'];

if($function == 'delete'){
    $stmt = $db->prepare("DELETE from cart WHERE id_user = :uid AND id_product = :pid");
    $stmt->bindParam(':uid',$uid);
    $stmt->bindParam(':pid',$pid);
    $stmt->execute();

    echo 'deleted';


}
elseif ($function == 'add'){
    $stmt = $db->prepare("UPDATE cart SET quantity = quantity + 1 WHERE id_user = :uid AND id_product = :pid");
    $stmt->bindParam(':uid',$uid);
    $stmt->bindParam(':pid',$pid);
    $stmt->execute();
    echo 'added';


}
elseif ($function == 'reduce'){
    $stmt = $db->prepare("UPDATE cart SET quantity = quantity - 1 WHERE id_user = :uid AND id_product = :pid");
    $stmt->bindParam(':uid',$uid);
    $stmt->bindParam(':pid',$pid);
    $stmt->execute();
    echo 'reduced';
}
