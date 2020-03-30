<?php 

require_once 'vendor/autoload.php';

$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '5hbrqm96qgf2rfy7',
    'publicKey' => 'j7cymrvsyvn5y29z',
    'privateKey' => '99687ffc4c09ef979ce0e3630de16c5c'
]);


if(isset($_POST["nonce"])){
    $nonceFromTheClient = $_POST["nonce"];

    $result = $gateway->paymentMethod()->create([
        //'customerId' => '863215963',
        'paymentMethodNonce' => $nonceFromTheClient
    ]);

    $result = $gateway->transaction()->sale([
        'amount' => '10.00',
        'paymentMethodNonce' => $nonceFromTheClient,
        //'deviceData' => $deviceDataFromTheClient,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      echo json_encode($result);

} else {
    $clientToken = $gateway->clientToken()->generate([
        //"customerId" => "863215963"
    ]);

    echo $clientToken;
}
