<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../includes/db.php";
header('Content-Type: application/json; charset=utf-8');

$key = $_GET['key'];
$uid = $_GET['email'];
$type = $_GET['type'];
$value = $_GET['value'];

if (!isset($key) || !isset($uids)|| !isset($value)){
    echo json_encode('All fields must be set');
    exit();
}

//action 1 = add points
if ($type == 1){
    $stmt = $db->prepare("SELECT rights FROM api_key WHERE APIKey = :apikey");
    $stmt->bindParam(':apikey',$key);
    $stmt->execute();
    $hasRight = $stmt->fetch();

    if ($hasRight['rights'] < 3){
        echo 'Forbidden';
        exit();
    }
    $stmt = $db->prepare("UPDATE users SET solde = (solde + :value) WHERE email = :user");
    $stmt->bindParam(':value',$value);
    $stmt->bindParam(':user',$uids);
    $stmt->execute();

    echo json_encode('points added');
    exit();
}


// if action = 2 permet de retirer des points
if ($type == 2){
    $stmt = $db->prepare("SELECT rights FROM api_key WHERE APIKey = :apikey");
    $stmt->bindParam(':apikey',$key);
    $stmt->execute();
    $hasRight = $stmt->fetch();

    if ($hasRight['rights'] < 3){
        echo 'Forbidden';
        exit();
    }

    $stmt = $db->prepare("SELECT solde FROM users WHERE email = :user");
    $stmt->bindParam(':user',$uids);
    $stmt->execute();
    $checkSold = $stmt->fetch();
    echo $checkSold['solde'];
    if ($checkSold['solde'] - $value < 0 ){
        echo json_encode('False');
        exit();
    }


    $stmt = $db->prepare("UPDATE users SET solde = (solde - :value) WHERE id = :user");
    $stmt->bindParam(':value',$value);
    $stmt->bindParam(':user',$uids);
    $stmt->execute();

    echo json_encode('True');
}

else{
    echo json_encode('error');
}
exit();
