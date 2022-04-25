<?php

ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );


require_once './vendor/autoload.php';

use BingPay\Airtime;
use BingPay\Connection;
use BingPay\Data;
use BingPay\Wallet;

// call the connection class
$connection = new Connection();

// Add your private key here
$connection->addPrivateKey('1dd501141dffd9d68f254b241f05871b8f10754c90f4832ad9');

// Get the private key
$key = $connection->getPrivateKey();

new Wallet($key);
new Data($key);


// call the Airtime class

$airitme_con = new Airtime($key);

// Check the balance
$check_bal = Wallet::checkBalance();

// if check balance is successful print the balance and the currency
if($check_bal){
    echo 'Balance:'. ' ' .$check_bal->data->balance;
    echo '<br>';
    echo 'Currency:'. ' ' .$check_bal->data->currency;
}else{
    echo $check_bal->error;
}

echo '<hr>';
echo '<h1>All Networks</h1>';

// get all networks

$all_networks = Airtime::getAllNetwork();

if($all_networks){
    // echo 'yes';
    foreach($all_networks->data as $data){
        echo 'Network Provider: '.$data->name;
        echo '<br>';
        echo 'Network Note: '.$data->note;
        echo '<br>';
    }
}else{
    echo $check_bal->error;
}

$phone = '08142403525';
$network = 1;
$amount = '100';

echo '<hr>';
echo '<h1>Buy Airtime</h1>';

$buyairtime = Airtime::buyAirtime($phone, $amount, $network);
echo $buyairtime->message;

    echo '<hr>';
    echo '<h1>Verify phone number</h1>';

// Verifyphone number
$verify = Airtime::verifyPhone('NG', '07061785183');
if($verify){
    echo $verify->message;
    echo '<br>';
    echo $verify->data[0]->mobile;
    echo '<br>';
    echo $verify->data[0]->name;
    echo '<br>';
    echo $verify->data[0]->country;
    echo '<br>';
    echo $verify->data[0]->status;
    echo '<br>';
}

echo '<hr>';
echo '<h1>Get all data plan</h1>';


$getdata = Data::getAllDataPlan();
if($getdata){
    echo $getdata->message . ' '. '<br>';
    foreach($getdata->data as $data){
        echo 'Network_id' . ' '. $data->network_id . ' '. '<br>';
        echo 'name' . ' '. $data->name . ' '. '<br>';
        echo 'price' . ' '. $data->price . ' '. '<br>';
        echo 'uniq_id' . ' '. $data->uniq_id . ' '. '<br>';
    }
}

echo '<hr>';
echo '<h1>Get data plan for a network id</h1>';

$getsingledata = Data::getDataPlan(2);
echo $getsingledata->message . ' '. '<br>';
foreach($getsingledata->data as $data){
    echo 'Network_id' . ' '. $data->network_id . ' '. '<br>';
    echo 'name' . ' '. $data->name . ' '. '<br>';
    echo 'price' . ' '. $data->price . ' '. '<br>';
    echo 'uniq_id' . ' '. $data->uniq_id . ' '. '<br>';
}


echo '<hr>';
echo '<h1>Buy data</h1>';

$buyData = Data::buyData('07061785183', '100', 1);
echo $buyData->message;

?>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="phone"> <br>
        <input type="text" name="amount"> <br>
        <input type="text" name="network"> <br>
        <button name="submit">Buy</button>
    </form>
</body>
</html> -->