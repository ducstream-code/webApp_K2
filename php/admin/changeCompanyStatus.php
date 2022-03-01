<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../includes/db.php";

$status = $_GET['status'];
$id = $_GET['id'];
$stmt = $db->prepare("UPDATE clientscompanies SET verified = :status where id = :id");
$stmt->bindParam(':status',$status);
$stmt->bindParam(':id',$id);
$stmt->execute();

