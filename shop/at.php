<?php

require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

$username   = "sandbox";
$apiKey     = "f3bded7ae68e3c539973e2929271fdd2c9af27f16a615a7e593041d1e4741854";

// Initialize the SDK and get payments method
$AT         = new AfricasTalking($username, $apiKey);
$payments   = $AT->payments();

$options = [
    "productName"   => "Kibanda",
    "phoneNumber"   =>  $_POST["phoneNumber"],
    "currencyCode"  => "KES",
    "amount"        => $total,
    "metadata"      => [
        "email" => "client@abc.com"
    ]];
//Process Payment

if (isset($_POST["phoneNumber"])) { 
        $result = $payments->mobileCheckout($options);
        include 'views/processing.html';
        print_r($result);
    } else {
    include 'views/cart.html';
}
