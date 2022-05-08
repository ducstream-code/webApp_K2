<?php

include "../includes/db.php";
require '../vendor/autoload.php';

// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51Iw30hAx4XWMLumfhvVm8NnOQYk8yxjFMNC9ZXcDKni4ti1qUX92wC0fhivOqVUtUVyo3X4VS0Zbm7InJbCq2Gge00XuYRcamp');

function calculateOrderAmount(): int {
//connexion a la base de donnée
    try {
        $db = new PDO('mysql:host=152.228.218.3:3306;dbname=loyaltycard', 'rooter', 'U8bg^86j', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    $uid = $_COOKIE['id'];
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
    $total = $total*100;
    return $total;
}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'eur',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
