<?php
include '../../includes/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];

$stmt = $db->prepare("UPDATE contact SET isAnswered = 1 WHERE id= :id");
$stmt->bindParam(':id',$id);
$stmt->execute();

