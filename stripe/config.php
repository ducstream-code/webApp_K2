<?php
require_once "../vendor/autoload.php";
use Stripe\Stripe;
use Omnipay\Omnipay;

define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51Iw30hAx4XWMLumfPg5tAGJkPMFrOAAcf3hzePpIlNHSb2LvlDsTf4ErVNEzM7WlXdoiakwJThlhkeelcwgtbdIa00Seq40hGs');
define('STRIPE_SECRET_KEY', 'sk_test_51Iw30hAx4XWMLumfhvVm8NnOQYk8yxjFMNC9ZXcDKni4ti1qUX92wC0fhivOqVUtUVyo3X4VS0Zbm7InJbCq2Gge00XuYRcamp');
define('RETURN_URL', './confirm.php');
define('PAYMENT_CURRENCY', 'EUR');

$gateway = Omnipay::create('Stripe\PaymentIntents');
$gateway->setApiKey(STRIPE_SECRET_KEY);