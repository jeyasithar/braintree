<?php 

require_once 'vendor/autoload.php';

$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '5hbrqm96qgf2rfy7',
    'publicKey' => 'j7cymrvsyvn5y29z',
    'privateKey' => '99687ffc4c09ef979ce0e3630de16c5c'
]);

$result = $gateway->transaction()->refund($_POST['transaction']['id']);

echo json_encode($result);
