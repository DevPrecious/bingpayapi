<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include 'index.php';


$test = new BingPay();
echo $test->getBalance()->data->balance;
echo '<br>';
echo $test->fetchAllNetwork()->message;
// var_dump($test->fetchAllNetwork());
// foreach($test->fetchAllNetwork()->data as $data){
//     echo 'Network Provider: '.$data->name;
//     echo '<br>';
//     echo 'Network Note: '.$data->note;
//     echo '<br>';
// }
echo '<br>';
echo $test->purchaseAirtime('08733', 100, 1)->message;
echo '<br>';
echo $test->verifyNumber('08733', 100)->message;
echo '<br>';
echo $test->fetchAllBanks()->message;
echo '<br>';
echo $test->resolveBank(214, 7412636015)->message;
echo '<br>';
echo $test->buyData('082', 100, 1)->message;
echo '<br>';
echo $test->getAllDataPlan()->message;
echo '<br>';
echo $test->getDataPlan(1)->message;
echo '<br>';
echo $test->airtimeToCash(100, 1, '081')->message;
echo '<br>';
echo $test->getNetworkFee(100, 1)->message;
echo '<br>';
echo $test->getAllService()->message;
echo '<br>';
echo $test->getSingleService(1)->message;
echo '<br>';
echo $test->verifyCustomer(1,1,'prepaid')->message;
echo '<br>';
echo $test->purchaseBill(1,1,2,1)->message;
echo '<br>';
echo $test->verifyBvn('john', 'dod', '0811', '8393')->message;