<?php
// DISPLAY ERRORS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "../vendor/autoload.php";

use Stripe\Stripe;
use Omnipay\Omnipay;

define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51Iw30hAx4XWMLumfPg5tAGJkPMFrOAAcf3hzePpIlNHSb2LvlDsTf4ErVNEzM7WlXdoiakwJThlhkeelcwgtbdIa00Seq40hGs');
define('STRIPE_SECRET_KEY', 'sk_test_51Iw30hAx4XWMLumfhvVm8NnOQYk8yxjFMNC9ZXcDKni4ti1qUX92wC0fhivOqVUtUVyo3X4VS0Zbm7InJbCq2Gge00XuYRcamp');
define('RETURN_URL', './confirm.php');
define('PAYMENT_CURRENCY', 'EUR');

$gateway = Omnipay::create('Stripe\PaymentIntents');
$gateway->setApiKey(STRIPE_SECRET_KEY);

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
    //connexion a la base de donnée
    try {
        $db = new PDO('mysql:host=localhost:3306;dbname=loyaltycard', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $stmt = $db->prepare("DELETE FROM orders cart")





    header('Location: ./success.php');
} else {
    $_SESSION['payment_error'] = $response->getMessage();
    header('Location: ./failed.php');
}