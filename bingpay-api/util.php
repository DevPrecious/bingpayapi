<?php


ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );


require_once 'vendor/autoload.php';

use BingPay\Airtime;
use BingPay\Trade;
use BingPay\Bank;
use BingPay\Verify;
use BingPay\Connection;
use BingPay\Utility;

// call the connection class
$connection = new Connection();

// Add your private key here
$connection->addPrivateKey('1dd501141dffd9d68f254b241f05871b8f10754c90f4832ad9');

// Get the private key
$key = $connection->getPrivateKey();

// call the utility class


new Utility($key);
new Bank($key);
new Verify($key);
new Trade($key);
new Airtime($key);

// Get all services

echo '<h1>All Services</h1>';

$getallservices = Utility::getAllService();

echo $getallservices->message . '<br>';

foreach($getallservices->data as $data){
    echo 'Service Name: '.$data->name;
    echo '<br>';
    echo '<img src="'.$data->image_url.'" width="100" height="100">';
    echo '<br>';
    echo 'description: '.$data->description;
    echo '<br>';
}

// Get service with service id

echo '<h1>Single Service</h1>';

$getService = Utility::getSingleService('dstv');

echo $getService->message . '<br>';
echo $getService->data->ServiceName . '<br>';
echo $getService->data->serviceID . '<br>';
echo $getService->data->convinience_fee . '<br>';

foreach($getService->data->variations as $variation){
    echo '<br>';
    echo 'variation code: '.$variation->variation_code;
    echo '<br>';
    echo 'price: '.$variation->variation_amount;
    echo '<br>';
    echo 'name: '.$variation->name;
    echo '<br>';
    echo 'fixedPrice: '.$variation->fixedPrice;
    echo '<br>';
}

// Verify customers
echo '<h1>Verify customer</h1>';

$verifycustomer = Utility::verifyCustomer('dstv', '7530552372', 'prepaid');
echo 'Customer: '. ' '. $verifycustomer->message;

// Purchase bill
echo '<h1>Purchase bill</h1>';

$purchaseBill = Utility::purchaseBill('dstv', '1212121212', 'OGpeIVhvRsnDdarBET0XQ/Hw', '2150');

echo $purchaseBill->message;

// Network fee
echo '<h1>Network fee</h1>';

$networkfee = Trade::getNetworkFee(5000, 4);
echo $networkfee->message;
echo 'Mobile' . ' ' .$networkfee->data->mobile . '<br>';
echo 'Amount' . ' ' . $networkfee->data->amount . '<br>';
echo 'Value' . ' ' . $networkfee->data->value . '<br>';
echo 'Charge' . ' ' . $networkfee->data->charge . '<br>';

// Airtime to cash
echo '<h1>Airtime to cash</h1>';

$airtime = Trade::airtimeToCash('1000', 1, '08142403525');

echo $airtime->message;

// Verify Bvn
echo '<h1>Verify BVN</h1>';

$verifyBvn = Verify::verifyBVN('John', 'Doe', '0701234567', '0123456789');

echo $verifyBvn->message;

// Get all banks
echo '<h1>Get all banks</h1>';

$getAllBanks = Bank::getAllBanks();

$getAllBanks->message;

foreach($getAllBanks->data as $data){
    echo 'Bank Name: '.$data->name;
    echo '<br>';
    echo 'Bank Code: '.$data->code;
    echo '<br>';
    echo 'Bank Country: '.$data->country;
    echo '<br>';
}

// resolve bank account
echo '<h1>Resolve bank account</h1>';

$resolvebank = Bank::resolveBankAccount('214', '7412636015');

echo $resolvebank->data->message . '<br>';

echo 'Account Name: '.$resolvebank->data->accountName . '<br>';
echo 'Account Number: '.$resolvebank->data->accountNumber . '<br>';
echo 'Bank code: '.$resolvebank->data->bankCode . '<br>';