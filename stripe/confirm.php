<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "config.php";

$response = $gateway->confirm([
    'paymentIntentReference' => $_GET['payment_intent'],
    'returnUrl' => RETURN_URL,
])->send();

if($response->isSuccessful()) {
    $response = $gateway->capture([
        'amount' => $_SESSION['amount'],
        'currency' => PAYMENT_CURRENCY,
        'paymentIntentReference' => $_GET['payment_intent'],
    ])->send();

    $arr_payment_data = $response->getData();

    // Insert transaction data into the database

    header('Location: ../index/success.php');
} else {
    $_SESSION['payment_error'] = $response->getMessage();
    header('Location: ../index/error.php');
}