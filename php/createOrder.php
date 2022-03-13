<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../includes/db.php';
$id_user = $_GET['uid'];
$address = $_GET['address'];
$city = $_GET['city'];
$postalCode = $_GET['PC'];
$name = $_GET['name'];
$firstname = $_GET['firstname'];
$mail = $_GET['mail'];
$phone = $_GET['phone'];
$status = 0;

if(!isset($id_user) || empty($id_user)){
    echo 'Error While ordering';
    exit();
}
if(!isset($address) || empty($address)){
    echo 'You need an Address';
    exit();
}
if(!isset($city) || empty($city)){
    echo 'Please define a city';
    exit();
}
if(!isset($postalCode) || empty($postalCode)){
    echo 'Please define a postCode';
    exit();
}
if(!isset($name) || empty($name)){
    echo 'Please define a name for your order';
    exit();
}
if(!isset($firstname) || empty($firstname)){
    echo 'Please define a firstname for your order';
    exit();
}
if(!isset($mail) || empty($mail)){
    echo 'Please define an email for your order';
    exit();
}
if(!isset($phone) || empty($phone)){
    echo 'A phone number is necessary';
    exit();
}


$uid = $id_user;
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




$stmt = $db->prepare("INSERT INTO orders (id_customer,address,city,postal_code,name,firstname,mail,phone,status,total) VALUES (:uid,:address,:city,:postal_code,:name,:firstname,:mail,:phone,:status,:total)");
$stmt->bindParam(':address',$address);
$stmt->bindParam(':city',$city);
$stmt->bindParam(':postal_code',$postalCode);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':firstname',$firstname);
$stmt->bindParam(':mail',$mail);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':uid',$id_user);
$stmt->bindParam(':total',$total);
$stmt->execute();

echo 'ok';