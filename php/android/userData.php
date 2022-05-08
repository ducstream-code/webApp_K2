<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');

include "../../includes/db.php";

$key = $_GET['key'];
$email = $_GET['email'];

$stmt = $db->prepare("SELECT rights FROM api_key WHERE APIKey = :apikey");
$stmt->bindParam(':apikey',$key);
$stmt->execute();
$hasRight = $stmt->fetch();

if ($hasRight['rights'] < 2) {
    echo json_encode('Forbidden');
    exit();
}

$stmt = $db->prepare("SELECT id, username, name, firstname, email, solde FROM users WHERE email = :email");
$stmt->bindParam(':email',$email);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($res);
