<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('../includes/db.php');
include ('../includes/check_session.php');
$mail = $_GET['email'];
$hash = $_GET['hash'];

if(!isset($hash) || empty($hash)){
header('Location:../index.php');
}

$stmt = $db->prepare("SELECT hash, email FROM register_mail WHERE hash = :hash");
$stmt->execute(['hash'=>$hash]);
$res = $stmt->rowCount();
$res2 = $stmt->fetch();


$stmt = $db->prepare("SELECT verified FROM clientscompanies WHERE email =:email");
$stmt->execute(['email'=>$mail]);
$res3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo $res3;

if($res3['verified'] = 1){
    echo $res3;
}

else{
    $stmt = $db->prepare("UPDATE clientscompanies SET verified=1 WHERE email = :email");
    $stmt->execute(['email'=>$res2['email']]);
    header('location:../pages/login.php?message=Mail vérifié, vous pouvez vous connecter&type=success');

}
