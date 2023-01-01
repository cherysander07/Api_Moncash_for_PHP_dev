<?php
require_once 'MoncashManager.php';

function configMoncash($amount,$orderId) {
require 'config.php';
$getMoncash = new MoncashPayment;
$getMoncash->clientId = $clientId;
$getMoncash->clientSecret = $clientSecret;
$getMoncash->isLive = $isLive;
// Create a object to allow you verify if the amount is correct
// : EX $getAmountByOrderId = $getMoncash->getAmountByOrderId($orderId);
// if($getAmountByOrderId == $amount) { :continue transaction } else { :close transaction }
$getMoncash->orderId  = $orderId;
$getMoncash->amount = $amount;
// =====================================================
$getToken = $getMoncash->generateToken();
$sendPayment = $getMoncash->postPayment();
header('Location:' . $sendPayment);

}


function returnUrl($transactionId) {
    require 'config.php';
$getMoncash = new MoncashPayment;
$getMoncash->clientId = $clientId;
$getMoncash->clientSecret = $clientSecret;
$getMoncash->isLive = $isLive;

$getToken = $getMoncash->generateToken();
 $returnDetails =  $getMoncash->getDetailsOfTransaction($transactionId);
    //identify the product with getReference
 $getReference = substr($returnDetails,10,3);
// TODO: 
// Stock getReference in your DB with the user ID, to know what product he bought.
header('Location:../'. $returnUrlBackHome);
}

?>