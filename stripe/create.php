<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

    if (!isset($_COOKIE['role']) && $_COOKIE['role'] !=1) {
        $uid = $_COOKIE['id'];
        $total = 0;
        $stmt = $db->prepare("SELECT id_product,quantity FROM cart WHERE id_user = :uid");
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        $cartP = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cartP as $key => $cart) {
            $stmt = $db->prepare("SELECT price from products WHERE id = :pid");
            $stmt->bindParam(":pid", $cart['id_product']);
            $stmt->execute();
            $res = $stmt->fetch();

            $total += ($cart['quantity'] * $res['price']);

        }
        $total = $total * 100;
    } else{
        $uid = $_COOKIE['id'];
        $total = 0;
        $stmt = $db->prepare("SELECT earnings FROM clientscompanies WHERE id = :id");
        $stmt->bindParam(":id",$uid);
        $stmt->execute();
        $earnings = $stmt->fetch();
        if ($earnings['earnings'] == 0){
            $total = 0;
        }
        elseif ($earnings['earnings']>200000 && $earnings['earnings'] <= 800000){
            $total = $earnings['earnings']*0.008*100;
        }
        elseif ($earnings['earnings']>800000 && $earnings['earnings'] <= 1500000){
            $total = $earnings['earnings']*0.006*100;
        }
        elseif ($earnings['earnings']>1500000 && $earnings['earnings'] <= 3000000){
            $total = $earnings['earnings']*0.004*100;
        }
        elseif ($earnings['earnings']>3000000 ){
            $total = $earnings['earnings']*0.003*100;
        }


    }



        if ($total < 1) {
            $total = 1;
        }
        return $total;


}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount(),
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
