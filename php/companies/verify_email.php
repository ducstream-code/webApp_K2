<?php

// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../includes/db.php');

$email = $_GET['email'];
$hash = $_GET['hash'];

if($hash = hash('sha256',$email)){

    $stmt= $db->prepare("SELECT verified FROM clientscompanies WHERE email = :email");
    $stmt->execute(['email'=>$email]);
    $status = $stmt->fetch();

    if($status['verified'] >=1){
        header('Location: /pages/company_admin/index.php?message=Mail déjà verifié.&type=danger');
    }else if ($status['verified'] == 0){
        $stmt = $db->prepare("UPDATE clientscompanies SET verified = 1 WHERE email = :email ");
        $stmt->execute(['email'=>$email]);
        header('Location: /pages/company_admin/index.php?message=Mail verifié.&type=success');
    }


}
