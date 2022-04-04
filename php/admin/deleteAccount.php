<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../../includes/db.php";
$uid = $_GET['uid'];

$stmt = $db->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id',$uid);
$stmt->execute();
echo 'ok';
