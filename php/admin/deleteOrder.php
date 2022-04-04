<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../../includes/db.php";
$id = $_GET['id_order'];

$stmt = $db->prepare("DELETE FROM orders WHERE id = :id  ");
$stmt->bindParam(':id',$id);
$stmt->execute();

$stmt = $db->prepare("DELETE FROM ordered_product WHERE id_order = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();


echo 'ok';
